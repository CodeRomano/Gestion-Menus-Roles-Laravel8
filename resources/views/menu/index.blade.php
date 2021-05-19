@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
      <h1>
        Menús
      </h1>
    </div>
    <div class="col-sm-6">
        <a href="{{ url('/menuNuevo') }}" class="btn btn-success float-right">+ Menú</a>
    </div>
  </div>
@stop

@section('content')
    <div class="container-fluid col-md-12">
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje') }}
            @endif
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 600px;">
                      <table class="table table-head-fixed text-nowrap table-hover table-striped table-bordered">
                        <thead>
                          <tr>
                          <th>Men Id</th>
                          <th>Icono</th>
                          <th>Link</th>
                          <th>Titulo</th>
                          <th>Descripcion</th>
                          <th>Tipo</th>
                          <th>Orden</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $claveSubMenu = ''; ?>
                            @foreach ($menus as $menu)
                            <?php 
                              $claveMenu = str_replace('.', '_',  $menu->Men_Id);
                              $claveIdMenu = "'".$claveMenu."'"; 
                            ?>
                            <tr>
                                <td class="text-left">
                                  <img class="img-thumbail img-fluid" id="img_{{ $claveMenu }}" src="{{ asset('storage').'/uploads/d_ocultar.png' }}" alt="" onclick="visualizarInfra({{$claveIdMenu}})">&nbsp;<b>{{ $menu->Men_Id }}</b></td>
                                <td>
                                    <img class="img-thumbail img-fluid" src="{{ asset('storage').'/'.$menu->Men_Icono }}" width="30" alt="">
                                </td>
                                <td>{{ $menu->Rec_Id }}</td>
                                <td>{{ $menu->Men_Titulo }}</td>
                                <td>{{ $menu->Men_Desc }}</td>
                                <td>{{ $menu->Men_Tipo }}</td>
                                <td>{{ $menu->Men_Orden }}</td>
                                <td>{{ $menu->Men_Estado }}</td>
                                <td align="right">
                                    <a href="{{ url('/submenuNuevo/'.$menu->Men_Id) }}" class="btn btn-success">+ Sub Menu</a>
                                    <a href="{{ url('/menu/'.$menu->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                     &nbsp; 
                                    <form action="{{ url('/menu/'.$menu->id) }}" class="d-inline" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas realmente borrar?')" value="Borrar" >
                                    </form>
                                </td>
                            </tr>
                                    @foreach ($submenus as $submenu)
                                    @if (substr($submenu->Men_Id, '0' ,strpos($submenu->Men_Id, '.'))===$menu->Men_Id)
                                    <?php 
                                        $claveSubMenu = str_replace('.', '_', $submenu->Men_Id);
                                        $claveIdSubMenu = "'".$claveSubMenu."'";
                                    ?>
                                    <tr class="div_{{$claveMenu}}">
                                      <td class="text-left">&nbsp;&nbsp;&nbsp;<img class="img-thumbail img-fluid" id="img_{{$claveSubMenu}}" src="{{ asset('storage').'/uploads/d_ocultar.png' }}" alt="" onclick="visualizarDiv({{$claveIdSubMenu}});">&nbsp;<b>{{ $submenu->Men_Id }}</b></td>
                                      <td>
                                          <img class="img-thumbail img-fluid" src="{{ asset('storage').'/'.$submenu->Men_Icono }}" width="30" alt="">
                                      </td>
                                      <td>{{ $submenu->Rec_Id }}</td>
                                      <td>{{ $submenu->Men_Titulo }}</td>
                                      <td>{{ $submenu->Men_Desc }}</td>
                                      <td>{{ $submenu->Men_Tipo }}</td>
                                      <td>{{ $submenu->Men_Orden }}</td>
                                      <td>{{ $submenu->Men_Estado }}</td>
                                      <td align="right">
                                          <a href="{{ url('/itemNuevo/'.$submenu->Men_Id) }}" class="btn btn-success">+ Item</a>
                                          <a href="{{ url('/menu/'.$submenu->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                          &nbsp; 
                                          <form action="{{ url('/menu/'.$submenu->id) }}" class="d-inline" method="post">
                                              @csrf
                                              {{ method_field('DELETE') }}
                                              <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas realmente borrar?')" value="Borrar" >
                                          </form>
                                      </td>
                                    </tr>
                                          @foreach ($items as $item)
                                          @if (substr($item->Men_Id, '0' ,strrpos($item->Men_Id, '.'))===$submenu->Men_Id)
                                          <tr class="div_{{$claveMenu}} div_{{$claveSubMenu}}">
                                            <td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ $item->Men_Id }}</b></td>
                                            <td>
                                                <img class="img-thumbail img-fluid" src="{{ asset('storage').'/'.$submenu->Men_Icono }}" width="30" alt="">
                                            </td>
                                            <td>{{ $item->Rec_Id }}</td>
                                            <td>{{ $item->Men_Titulo }}</td>
                                            <td>{{ $item->Men_Desc }}</td>
                                            <td>{{ $item->Men_Tipo }}</td>
                                            <td>{{ $item->Men_Orden }}</td>
                                            <td>{{ $item->Men_Estado }}</td>
                                            <td align="right">
                                                <a href="{{ url('/menu/'.$item->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                                &nbsp; 
                                                <form action="{{ url('/menu/'.$item->id) }}" class="d-inline" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas realmente borrar?')" value="Borrar" >
                                                </form>
                                            </td>
                                          </tr>
                                          @endif
                                          @endforeach
                                      @endif
                                    @endforeach
                                    @foreach ($items as $item)
                                          @if (substr($item->Men_Id, '0' ,strrpos($item->Men_Id, '.'))==$menu->Men_Id)
                                          <tr class="div_{{$claveMenu}} div_{{$claveSubMenu}}">
                                            <td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ $item->Men_Id }}</b></td>
                                            <td>
                                                <img class="img-thumbail img-fluid" src="{{ asset('storage').'/'.$submenu->Men_Icono }}" width="30" alt="">
                                            </td>
                                            <td>{{ $item->Rec_Id }}</td>
                                            <td>{{ $item->Men_Titulo }}</td>
                                            <td>{{ $item->Men_Desc }}</td>
                                            <td>{{ $item->Men_Tipo }}</td>
                                            <td>{{ $item->Men_Orden }}</td>
                                            <td>{{ $item->Men_Estado }}</td>
                                            <td align="center">
                                                <a href="{{ url('/menu/'.$item->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                                &nbsp; 
                                                <form action="{{ url('/menu/'.$item->id) }}" class="d-inline" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas realmente borrar?')" value="Borrar" >
                                                </form>
                                            </td>
                                          </tr>
                                          @endif
                                          @endforeach
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>             
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="treetable/adminlte.min.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    {{-- <script type="text/javascript" src="treetable/adminlte.min.js"></script> --}}
    <script>
      function visualizarInfra(tipo){
          visualizarDiv(tipo);
      }
      function visualizarDiv(tipo){
          var valor = $('#img_'+tipo).attr('ver');
          if(valor=='N'){
              $('#img_'+tipo).attr('ver','S');
              $('#img_'+tipo).attr('src','img/d_ocultar.png');
              $('.div_'+tipo).show();
          }else{
              $('#img_'+tipo).attr('ver','N');
              $('#img_'+tipo).attr('src','img/d_mostrar.png');
              $('.div_'+tipo).hide();
          }
      }
    </script>
@stop
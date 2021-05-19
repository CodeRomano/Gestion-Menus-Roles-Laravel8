@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
      <h1>
        Roles
      </h1>
    </div>
    <div class="col-sm-6">
        <a href="{{ url('/rol/create') }}" class="btn btn-success float-right"> Agregar Rol</a>
    </div>
  </div>
@stop

@section('content')
    <div class="container-fluid">
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje') }}
            @endif
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 130px;">
                          
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 500px;">
                      <table class="table table-head-fixed text-nowrap table-hover table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sistema</th>
                            <th>Rol</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                            <tr>
                                <td>{{ $rol->Rol_Sistema }}</td>
                                <td>{{ $rol->Rol_Id }}</td>
                                <td>{{ $rol->Rol_Desc }}</td>
                                <td>{{ $rol->Rol_Estado }}</td>
                                <td align="right">
                                    <a href="{{ url('/rol/'.$rol->id.'/edit') }}" class="btn btn-warning">Editar</a>
                                     | 
                                    <form action="{{ url('/rol/'.$rol->id) }}" class="d-inline" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas realmente borrar este Rol?')" value="Borrar" >
                                    </form>
                                </td>
                            </tr>
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
    {{-- <script>
    $.ajax({
      url: {{url('/colaboradores/Pedro')}},
      method: 'get',
      dataType: 'json',
      success: function(respuesta) {
        console.log("información");
      },
      error: function() {
        console.log("No se ha podido obtener la información");
      }});
      </script> --}}
    {{-- <script type="text/javascript" src="treetable/adminlte.min.js"></script> --}}
@stop
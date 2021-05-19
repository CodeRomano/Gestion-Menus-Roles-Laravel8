
<?php $arrayP = array(); ?>
    <div style="display:none">
@foreach ($checkOn as $item)
    {{ $arrayP[] = $item->Men_Id}}
@endforeach

</div>
<div class="card-body">
    <div class=row>
    <div class="form-group col-3" >
        <label for="Rol_Sistema"> Sistema</label>
        <input type="text" class="form-control" name="Rol_Sistema" value="{{ isset($rol->Rol_Sistema) ? $rol->Rol_Sistema:'' }}" id="Rol_Sistema" required="required">
    </div>
    <div class="form-group col-3">
        <label for="Rol_Id"> Rol</label>
        <input type="text" class="form-control" name="Rol_Id" value="{{ isset($rol->Rol_Id) ? $rol->Rol_Id:'' }}" id="Rol_Id" required="required">
    </div>
    <div class="form-group col-3">
        <label for="Rol_Desc"> Descripción</label>
        <input type="text" class="form-control" name="Rol_Desc" value="{{ isset($rol->Rol_Desc) ? $rol->Rol_Desc:'' }}" id="Rol_Desc" required="required">
    </div>
    <div class="form-group col-3">
        <label for="Rol_Estado"> Estado</label>
        <select class="form-control custom-select" name="Rol_Estado"  id="Rol_Estado" required="required">
            <option value="A" {{ trim(isset($rol->Rol_Estado))=='A' ? 'selected':'' }}>Activo</option>
            <option value="X" {{ trim(isset($rol->Rol_Estado))=='X' ? 'selected':'' }}>Inactivo</option>
        </select>
        {{-- <input type="text" class="form-control" name="Rol_Estado" value="{{ isset($rol->Rol_Estado) ? $rol->Rol_Estado:'' }}" id="Rol_Estado"> --}}
    </div>
</div>
    
    <div class="form-group">
        <label for="Rol_Id"> Permisos</label>
        <div id="arbol_permisos" style="width:99%; height:350px; overflow: auto; background-color: #DAE4F1; border: 1px solid #ACC4DF">
            
            <ul style="list-style: none;">
            @foreach ($menus as $menu)
                <li><img src="{{ asset('storage').'/'.$menu->Men_Icono }}" border="0" width="20"><b>{{ $menu->Men_Titulo }}</b></li>
                <ul style="list-style: none;">
                @foreach ($submenus as $submenu)
                    @if (substr($submenu->Men_Id, '0' ,strpos($submenu->Men_Id, '.'))===$menu->Men_Id)
                        <li><img src="{{ asset('storage').'/'.$submenu->Men_Icono }}" border="0" width="20">{{ $submenu->Men_Titulo }}</li>
                        <ul style="list-style: none;">
                        @foreach ($items as $item)
                            @if (substr($item->Men_Id, '0' ,strrpos($item->Men_Id, '.'))===$submenu->Men_Id)
                            <li {{ in_array($item->Men_Id, $arrayP) ? 'class=text-primary':'' }} ><input type="checkbox" {{ in_array($item->Men_Id, $arrayP) ? 'checked':'' }}  name="arrayMenus[{{ $item->Men_Id }}]" id="arrayMenus[{{ $item->Men_Id }}]"> <img src="{{ asset('storage').'/'.$item->Men_Icono }}" border="0" width="20">{{ $item->Men_Titulo }}</li>
                            @endif
                        @endforeach
                        </ul>
                    @endif
                @endforeach
                @foreach ($items as $item)
                    @if (substr($item->Men_Id, '0' ,strrpos($item->Men_Id, '.'))===$menu->Men_Id)
                    <li {{ in_array($item->Men_Id, $arrayP) ? 'class=text-primary':'' }} > <input type="checkbox" {{ in_array($item->Men_Id, $arrayP) ? 'checked':'' }} name="arrayMenus[{{ $item->Men_Id }}]" id="arrayMenus[{{ $item->Men_Id }}]"> <img src="{{ asset('storage').'/'.$item->Men_Icono }}" border="0" width="20">{{ $item->Men_Titulo }}</li>
                    @endif
                @endforeach    
            </ul><br/>
            @endforeach
            </ul>
        </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <input class="btn btn-success" type="submit" value="{{ $modo }} Rol">
    <a class="btn btn-primary" href="{{ url('/rol') }}"> Regresar</a>
  </div>
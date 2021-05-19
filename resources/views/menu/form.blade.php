<div class="card-body">
    <div class="form-group">
        <label for="Men_Id"> Menu Id</label>
        <input type="text" class="form-control" name="Men_Id" readonly="readonly" value="{{ isset($menu->Men_Id) ? $menu->Men_Id:$newMenuId }}" id="Men_Id">
    </div>
    <div class="form-group">
        <label for="Rec_Id"> Link</label>
        <input type="text" class="form-control" name="Rec_Id" value="{{ isset($menu->Rec_Id) ? $menu->Rec_Id:'' }}" id="Rec_Id" required="required">
    </div>
    <div class="form-group">
        <label for="Men_Titulo"> Titulo</label>
        <input type="text" class="form-control" name="Men_Titulo" value="{{ isset($menu->Men_Titulo) ? $menu->Men_Titulo:'' }}" id="Men_Titulo" required="required">
    </div>
    <div class="form-group">
        <label for="Men_Desc"> Descripcion</label>
        <input type="text" class="form-control" name="Men_Desc" value="{{ isset($menu->Men_Desc) ? $menu->Men_Desc:'' }}" id="Men_Desc" required="required">
    </div>
    <div class="form-group">
        <label for="Men_Icono"> Icono</label>
        @if(isset($menu->Men_Icono))
            <img class="img-thumbail img-fluid" src="{{ asset('storage').'/'.$menu->Men_Icono }}" alt="">
        @endif
        <input type="file" class="form-control" name="Men_Icono" value="" id="Men_Icono">
    </div>
    <div class="form-group">    
        <label for="Men_Tipo"> Tipo</label>
         <input type="text" class="form-control" readonly="readonly" name="Men_Tipo" value="{{ isset($menu->Men_Tipo) ? $menu->Men_Tipo:$tipo }}" id="Men_Tipo">
    </div>
    <div class="form-group">
        <label for="Men_Orden"> Orden <code> (solo se permiten números)</code>
        </label>
        <input type="text" class="form-control" name="Men_Orden" value="{{ isset($menu->Men_Orden) ? $menu->Men_Orden:'' }}" id="Men_Orden" required="required" pattern="[0-9]+">
    </div>
    <div class="form-group">
        <label for="Men_Estado"> Estado</label>
        {{-- <input type="text" class="form-control" name="Men_Estado" value="{{ isset($menu->Men_Estado) ? $menu->Men_Estado:'' }}" id="Men_Estado"> --}}
        <select class="form-control" name="Men_Estado" id="Men_Estado" required="required">
            <option value="" disabled="disabled">Seleccione</option>
            <option value="A" {{ isset($menu->Men_Estado) ? ($menu->Men_Estado=='A' ? 'selected':''):'' }}>&nbsp;&nbsp;ACTIVO</option>
            <option value="X" {{ isset($menu->Men_Estado) ? ($menu->Men_Estado=='X' ? 'selected':''):'' }}>&nbsp;&nbsp;INACTIVO</option>
          </select>  
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <input class="btn btn-success" type="submit" value="{{ $modo }} Menú">
    <a class="btn btn-primary" href="{{ url('/menu') }}"> Regresar</a>
  </div>
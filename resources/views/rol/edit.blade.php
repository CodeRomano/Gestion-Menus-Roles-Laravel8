@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="container-fluid col-md-8 col-md-offset-2">
    @if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card ">
            <!-- form start -->
            <form action="{{ url('/rol/'.$rol->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                {{ method_field('PATCH') }}
                @include('rol.form', ['modo'=>'Editar'])
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            
        </div>
        <!--/.col (right) -->
      </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
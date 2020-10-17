@extends('layouts.app')

@section('content')


<!-- Plugins css -->
<link href="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.css') }}" rel="stylesheet" />
@toastr_css
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <!--
                    <div class="btn-group m-0 pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Urora</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Crear tipo de evento</h4>
                    -->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <!-- @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error!</strong> {{ Session::get('error') }}.
                </div>
                @endif -->
                <div class=" m-b-30">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-xl-6 offset-md-3">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="col-sm-6">
                                            <h4 class="mt-0 header-title">Datos del usuario</h4>                                            
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="alert alert-danger alert-dismissible fade show">Todos los campos son requeridos</p>
                                        </div>
                                            <div class="general-label">
                                                <form method="POST" action="{{ route('usuarios.update', $usuarios->id) }}" class="mb-0">
                                                @csrf
                                                @method('PUT')
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="id" class="bmd-label-floating ">ID</label>
                                                            <input type="text" class="form-control" id="id" name="id" value="{{ $usuarios->id }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row grid-col p-3">
                                                        <div class="col-sm-6">    
                                                            <div class="form-group">
                                                                <label for="name" class="bmd-label-floating ">Nombre</label>
                                                                <input type="text" class="form-control" id="alloptions" name="name" autocomplete="off" maxlength="30" value="{{ old('name', $usuarios->name) }}">
                                                                @error('name')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="apellido" class="bmd-label-floating ">Apellido</label>
                                                                <input type="text" class="form-control" id="alloptions" name="apellido" autocomplete="off" maxlength="30" value="{{ old('apellido', $usuarios->apellido) }}">
                                                                @error('apellido')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row grid-col p-3">
                                                        <div class="col-sm-6">  
                                                            <div class="form-group">
                                                                <label for="rut" class="bmd-label-floating ">Rut</label>
                                                                <input type="text" class="form-control" name="rut" minlength="9" maxlength="12" autocomplete="off" value="{{ old('rut', $usuarios->rut) }}" onkeyup="formatoRut(this)" onkeypress="return caracteresRut(event);">
                                                                @error('rut')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>    
                                                        <div class="col-sm-6">                                                  
                                                            <div class="form-group">
                                                                <label for="email" class="bmd-label-floating ">Email</label>
                                                                <input type="text" class="form-control" id="alloptions" name="email" autocomplete="off" maxlength="50" value="{{ old('email', $usuarios->email) }}">
                                                                @error('email')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row grid-col p-3" hidden>
                                                        <div class="col-sm-6"> 
                                                            <div class="form-group">
                                                                <label for="password" class="bmd-label-floating ">Contraseña</label>
                                                                <input type="text" class="form-control" id="alloptions" name="password" autocomplete="off" value="{{ old('password', $usuarios->password) }}">
                                                                @error('password')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6"> 
                                                            <div class="form-group">
                                                                <label for="username" class="bmd-label-floating ">Nombre de usuario </label>
                                                                <input type="text" class="form-control" id="alloptions" name="username" autocomplete="off" value="{{ old('username', $usuarios->username) }}">
                                                                @error('username')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row grid-col p-3">
                                                        <div class="col-sm-6"> 
                                                            <div class="form-group">
                                                                <label for="telefono" class="bmd-label-floating ">Teléfono</label>
                                                                <input type="text" class="form-control" id="alloptions" name="telefono" autocomplete="off" maxlength="11" onkeypress="return justNumbers(event);" value="{{ old('telefono', $usuarios->telefono) }}">
                                                                @error('telefono')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="rut" class="bmd-label-floating ">Fecha nacimiento</label>
                                                                <input type="text" class="form-control" id="mdate" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', \Carbon\Carbon::parse($usuarios->fecha_nacimiento)->format('d-m-yy')) }}">   
                                                                @error('fecha_nacimiento')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row grid-col p-3">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select class="form-control" id="vivienda_id" name="vivienda_id">
                                                                    <option value="0">Seleccione una vivienda</option>
                                                                @foreach($viviendas as $vivienda)
                                                                    <option {{ $usuarios->vivienda_id == $vivienda->id ? 'selected' : '' }} value="{{ ($vivienda->id) }}">{{ ($vivienda->direccion) }}</option>
                                                                @endforeach
                                                                </select>
                                                                @error('vivienda_id') 
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select class="form-control" id="rol" name="rol">
                                                                    <option value="0">Seleccione un rol</option>
                                                                    <option value="2">Administrador</option>
                                                                    <option value="3">Ejecutivo</option>
                                                                    <option value="4">Estandar</option>
                                                                </select>
                                                                @error('rol') 
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                        <li class="parsley-required">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </li>
                                                                    </ul>                                                                
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="estado" class="bmd-label-static">Estado</label>
                                                            <div class="mt-3">
                                                                <div class="mb-0">
                                                                    <div class="switch">
                                                                        <label>
                                                                        @if($usuarios->estado == 1)
                                                                        <input type="checkbox" class="switchEstado" checked>
                                                                            <span id="lSwitchEstado" name="lSwitchEstado" class="text-success">Activo</span>
                                                                        </label>
                                                                        @else
                                                                        <input type="checkbox" class="switchEstado">
                                                                            <span id="lSwitchEstado" name="lSwitchEstado" class="text-danger">Inactivo</span>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="text" id="estado" name="estado" value="{{ old('estado', $usuarios->estado) }}" class="mt-3" hidden="">
                                                            @error('estado')
                                                                <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                    <li class="parsley-required">
                                                                        <strong>
                                                                            {{ $message }}
                                                                        </strong>
                                                                    </li>
                                                                </ul>                                                                
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>                                                    
                                                    <button type="submit" style="left:1.5%" class="btn btn-primary btn-raised mb-0">Actualizar</button>
                                                    <a href="{{ route('usuarios.index') }}" style="left:2.5%" class="btn btn-raised btn-danger mb-0">Cancelar</a>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div> <!-- end col -->                                                                                                              
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </div><!-- end row -->

    </div> <!-- end container -->
</div>
@toastr_js
@toastr_render
<script type="text/javascript">
    function formatoRut(rut)
    {rut.value=rut.value.replace(/[.-]/g, '')
    .replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')}
</script>
<script>
    function caracteresRut(e) {
        var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = "0123456789k",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

        for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        }
    }
</script>
<script type="text/javascript">
    function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
  </script>

<!--Wysiwig js-->   
<script src="{{ asset('template/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/form-editor-init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('template/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/timepicker/moment-with-locales.js') }}">
    moment.locale('es');
</script>
<script src="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.js') }}"></script>
<script src="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Plugins Init js -->
<script src="{{ asset('template/assets/pages/form-advanced.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
$(document).ready(function(){
    $('#fecha_nacimiento').bootstrapMaterialDatePicker({
        weekStart : 0, 
        time: false 
    });
});
</script>
@endsection
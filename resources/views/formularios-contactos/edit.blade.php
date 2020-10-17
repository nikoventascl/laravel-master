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
                                        <div class="col-sm-12">
                                            <h4 class="mt-0 header-title">Datos del Formulario</h4>
                                        </div>
                                        <div class="col-sm-12">    
                                            <p class="alert alert-danger alert-dismissible fade show"><code class="text-danger">Todos los campos son requeridos</code></p>
                                        </div>    
                                        <div class="general-label">
                                            <form method="POST" action="{{ route('formularioscontactos.update', $formularioContactos->id) }}" class="mb-0">
                                            @csrf
                                            @method('PUT')
                                                <div class="col-sm-12">  
                                                    <div class="form-group">
                                                        <label for="id" class="bmd-label-floating ">ID</label>
                                                        <input type="text" class="form-control" id="id" name="id" value="{{ $formularioContactos->id }}" disabled>
                                                    </div>
                                                </div>    
                                                <div class="col-sm-12">  
                                                    <select class="form-control" name="tipo_consultas_id">
                                                        <option value="0">Seleccione un tipo de Consulta</option>
                                                        @foreach($tipoConsultas as $tipoConsulta)
                                                            @if($tipoConsulta->estado == 1)
                                                                <option {{ $formularioContactos->tipo_consultas_id == $tipoConsulta->id ? 'selected' : '' }} value="{{ ($tipoConsulta->id) }}">{{ ($tipoConsulta->nombre) }}</option>
                                                            @endif 
                                                        @endforeach
                                                    </select>
                                                    @error('tipo_consultas_id')
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
                                                <div class="col-sm-12">  
                                                    <div class="form-group">
                                                        <label for="descripcion" class="bmd-label-floating ">Descripcion</label>
                                                        <input type="text" class="form-control" id="alloptions" name="descripcion" maxlength="45" value="{{ old('descripcion', $formularioContactos->descripcion) }}" autofocus>
                                                        @error('descripcion')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">  
                                                    <div class="form-group">
                                                        <label for="estado" class="bmd-label-static">Estado</label>
                                                        <div class="mt-3">
                                                            <div class="mb-0">
                                                                <div class="switch">
                                                                    <label>
                                                                    @if($formularioContactos->estado == 1)
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
                                                        <input type="text" id="estado" name="estado" value="{{ old('estado', $formularioContactos->estado) }}" class="mt-3" hidden="">
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
                                                <a href="{{ route('formularioscontactos.index') }}" style="left:2.5%" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function(){
    
    });
</script>
@endsection
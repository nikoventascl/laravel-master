@extends('layouts.app')

@section('content')

<!-- Plugins css -->
<link href="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/plugins/colorpicker/asColorPicker.min.css') }}" rel="stylesheet" />
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
                                            <h4 class="mt-0 header-title">Datos del Evento</h4>
                                        </div>
                                        <div class="col-sm-12">  
                                            <p class="alert alert-danger alert-dismissible fade show"><code class="text-danger">Todos los campos son requeridos</code></p>
                                        </div>
                                        <div class="general-label">
                                            <form method="POST" action="{{ route('eventos.update', $eventos->id) }}" class="mb-0">
                                            @csrf
                                            @method('PUT')
                                                <div class="col-sm-6"> 
                                                    <div class="form-group">
                                                        <label for="id" class="bmd-label-floating ">ID</label>
                                                        <input type="text" class="form-control" id="id" name="id" value="{{ $eventos->id }}" disabled>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-6"> 
                                                    <div class="form-group is-focused">
                                                        <label for="nombre" class="bmd-label-floating ">Nombre</label>
                                                        <input type="text" class="form-control" id="alloptions" name="nombre" maxlength="45" autocomplete="off" value="{{ old('nombre', $eventos->nombre) }}" autofocus>
                                                        @error('nombre')
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
                                                </div> -->
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label for="titulo" class="bmd-label-floating ">Titulo</label>
                                                        <input type="text" class="form-control" id="alloptions" name="titulo" maxlength="20" autocomplete="off" value="{{ old('titulo', $eventos->titulo) }}">
                                                        @error('titulo')
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
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label for="descripcion_corta" class="bmd-label-floating ">Descripcion corta</label>
                                                        <input type="text" class="form-control" id="alloptions" name="descripcion_corta" maxlength="60" autocomplete="off" value="{{ old('descripcion_corta', $eventos->descripcion_corta) }}">
                                                        @error('descripcion_corta')
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
                                                <div class="form-group p-3">
                                                    <h5 class="mt-0 header-title">Descripcion larga</h5>
                                                    <textarea id="elm1"  name="descripcion_larga" maxlength="10000" autofocus>{{ old('descripcion_larga', $eventos->descripcion_larga) }}</textarea>
                                                    @error('descripcion_larga')
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
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h6 class="text-muted">Tipo de evento</h6>
                                                        <select class="form-control" id="tipo_evento" name="tipo_evento">
                                                            <option value="0">Seleccione un tipo de evento</option>
                                                        @foreach($tipoEventos as $tipoEvento)
                                                            @if($tipoEvento->estado == 1)
                                                                <option {{ $eventos->tipo_eventos_id == $tipoEvento->id ? 'selected' : '' }} value="{{ ($tipoEvento->id) }}">{{ ($tipoEvento->nombre) }}</option>
                                                            @endif    
                                                        @endforeach
                                                        </select>
                                                        @error('tipo_evento')
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
                                                <div class="row grid-col p-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fecha_inicio" class="bmd-label-floating">Fecha inicio</label>
                                                            <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', \Carbon\Carbon::parse($eventos->fecha_inicio)->format('d-m-yy')) }}">
                                                            @error('fecha_inicio')
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fecha_termino" class="bmd-label-floating">Fecha termino</label>
                                                            <input type="text" class="form-control" id="fecha_termino" name="fecha_termino" value="{{ old('fecha_termino', \Carbon\Carbon::parse($eventos->fecha_termino)->format('d-m-yy')) }}">
                                                            @error('fecha_termino')
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
                                                    <div class="col-md-6">    
                                                        <div class="form-group"> 
                                                            <label for="hora_inicio" class="bmd-label-floating">Hora inicio</label>
                                                            <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true" autocomplete="false">
                                                                <input type="text" class="form-control" name="hora_inicio" autocomplete="off" value="{{ old('hora_inicio', \Carbon\Carbon::parse($eventos->hora_inicio)->format('H:m')) }}"> 
                                                                @error('hora_inicio')
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">     
                                                            <label for="hora_termino" class="bmd-label-floating">Hora termino</label>
                                                            <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <input type="text" class="form-control" name="hora_termino" value="{{ old('hora_termino', \Carbon\Carbon::parse($eventos->hora_termino)->format('H:m')) }}"> 
                                                                @error('hora_termino')
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
                                                </div>    
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label for="lugar" class="bmd-label-floating ">Lugar de encuentro</label>
                                                        <input type="text" class="form-control" id="alloptions" name="lugar" maxlength="200" autocomplete="off" value="{{ old('lugar', $eventos->lugar) }}">
                                                        @error('lugar')
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
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h6 class="text-muted mb-2">Color de evento</h6>                                            
                                                        <input type="text" name="color" class="colorpicker form-control" value="{{ old('color', $eventos->color) }}" />
                                                    </div> 
                                                </div>
                                                <div class="col-sm-6"> 
                                                    <div class="form-group">
                                                        <label for="estado" class="bmd-label-static">Estado</label>
                                                        <div class="mt-3">
                                                            <div class="mb-0">
                                                                <div class="switch">
                                                                    <label>
                                                                    @if($eventos->estado == 1)
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
                                                        <input type="text" id="estado" name="estado" value="{{ old('estado', $eventos->estado) }}" class="mt-3" hidden="">
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
                                                <a href="{{ route('eventos.index') }}" style="left:2.5%" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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

<script src="{{ asset('template/assets/plugins/colorpicker/jquery-asColor.js') }}"></script>
<script src="{{ asset('template/assets/plugins/colorpicker/jquery-asGradient.js') }}"></script>
<script src="{{ asset('template/assets/plugins/colorpicker/jquery-asColorPicker.min.js') }}"></script>

<!-- Plugins Init js -->
<script src="{{ asset('template/assets/pages/form-advanced.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#fecha_inicio').bootstrapMaterialDatePicker({
            weekStart : 0, 
            time: false 
        });
        $('#fecha_termino').bootstrapMaterialDatePicker({
            weekStart : 0, 
            time: false 
        });
    });
</script>
@endsection
@extends('layouts.app')

@section('content')
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
                    -->
                    <!--<h4 class="page-title">Crear tipo de evento</h4>
                        -->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12 col-xl-12 ">
                <!-- @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error!</strong> {{ Session::get('error') }}.
                </div>
                @endif -->
                <div class="m-b-30">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-xl-6 offset-md-3">
                                <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <h4 class="mt-0 header-title">Datos del tipo de evento</h4>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class="alert alert-danger alert-dismissible fade show">Todos los campos son requeridos</p>
                                            </div>
                                            <div class="general-label">
                                                <form method="POST" action="{{ route('tipoEventos.store') }}" class="mb-0">
                                                @csrf
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nombre" class="bmd-label-floating ">Nombre</label>
                                                            <input type="text" class="form-control" id="alloptions" name="nombre" autocomplete="off" maxlength="30" value="{{ old('nombre') }}">
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
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">                                                        
                                                            <label for="estado" class="bmd-label-static">Estado</label>
                                                            <div class="mt-3">
                                                                <div class="mb-0">
                                                                    <div class="switch">
                                                                        <label>
                                                                        <input type="checkbox" class="switchEstado" checked>
                                                                            <span id="lSwitchEstado" name="lSwitchEstado" class="text-success">Activo</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="text" id="estado" name="estado" value="1" class="mt-3" hidden="">
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
                                                    <button type="submit" style="left:1.5%" class="btn btn-primary btn-raised mb-0">Añadir nuevo</button>
                                                    <a href="{{ route('tipoEventos.index') }}" style="left:2.5%" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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
<!-- Plugins js -->
<script src="{{ asset('template/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- Plugins Init js -->
<script src="{{ asset('template/assets/pages/form-advanced.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
$(document).ready(function(){

});
</script>
@endsection

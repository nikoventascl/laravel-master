<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Villa Monte Darwin</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Pragma" content="no-cache"> 
    <meta http-equiv="no-cache"> 
    <meta http-equiv="Expires" content="-1"> 
    <meta http-equiv="Cache-Control" content="no-cache"> 

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('template/assets/css/custom.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('template/assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap-material-design.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.css') }}" rel="stylesheet" />
    @toastr_css
    @toastr_js
    @toastr_render
    </head>
<body>
    <br>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <center><i class="mdi mdi-account"></i>{{ __('Registrarse') }}</center></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="alloptions" type="text"  maxlength="30" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
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
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="alloptions" type="text" maxlength="30"  class="form-control" name="apellido" value="{{ old('apellido') }}" autocomplete="off">
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
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                                <div class="col-md-6">
                                    <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}"minlength="9" maxlength="12" onkeyup="formatoRut(this)" onkeypress="return caracteresRut(event);"  autocomplete="off">
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
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="alloptions" maxlength="50" type="text" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
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

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="alloptions" maxlength="20" minlength="8" type="password" class="form-control" name="password" autocomplete="off">
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

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input  id="alloptions" maxlength="20" type="password" class="form-control" name="password_confirmation" autocomplete="off">
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
                            <!-- <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="email">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="alloptions" maxlength="11" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" maxlength="11" onkeypress="return justNumbers(event);" autocomplete="off">

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
                            <div class="form-group row">
                                <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha nacimiento') }}</label>
                                <div class="col-md-6">
                                    <input id="fecha_nacimiento" autocomplete="off" type="text" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
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
                            <div class="form-group row">
                                <label for="vivienda_id" class="col-md-4 col-form-label text-md-right">{{ __('Vivienda') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="vivienda_id" name="vivienda_id">
                                        <option value="0">Seleccione una vivienda</option>
                                        @foreach($viviendas as $vivienda)
                                            <option {{ old('vivienda_id') == $vivienda->id ? 'selected' : '' }} value="{{ ($vivienda->id) }}">{{ ($vivienda->direccion) }}</option>
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
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <center><button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button> </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</body>  
</html>
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

<!-- jQuery  -->
<script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/assets/js/popper.min.js') }}"></script>

<script src="{{ asset('template/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('template/assets/js/detect.js') }}"></script>
<script src="{{ asset('template/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('template/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('template/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('template/assets/js/waves.js') }}"></script>
<script src="{{ asset('template/assets/js/jquery.scrollTo.min.js') }}"></script>


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
    $('#fecha_nacimiento').bootstrapMaterialDatePicker({
        weekStart : 1, 
        time: false     
    });
});
</script>
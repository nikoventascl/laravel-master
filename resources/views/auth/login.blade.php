<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Villa Monte Darwin</title>

    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Pragma" content="no-cache"> 
    <meta http-equiv="no-cache"> 
    <meta http-equiv="Expires" content="-1"> 
    <meta http-equiv="Cache-Control" content="no-cache"> 

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('template/assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap-material-design.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- jQuery  -->
    <script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/bootstrap-material-design.js') }}"></script>
    <script src="{{ asset('template/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/detect.js') }}"></script>
    <script src="{{ asset('template/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('template/assets/js/waves.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.scrollTo.min.js') }}"></script>

    <script src="{{ asset('template/assets/js/app.js') }}"></script>

    @toastr_css
</head>
<body>
    <div class="accountbg">
        <img src="{{ asset('template/assets/images/villa.png') }}">
    </div>
    <div class="wrapper-page">
        <div class="display-table">
            <div class="display-table-cell">
                <diV class="container">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center pt-3">
                                        <a href="index.html">
                                            <img src="{{ asset('template/assets/images/Captura2.png') }}" alt="logo" height="22" />
                                        </a>
                                        <div class="px-3 pb-3">
                                            <form class="form-horizontal m-t-20 mb-0" method="POST" action="{{ route('login') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox float-left">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="customCheck1">Recuérdame</label>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group text-right row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-raised btn-block waves-effect waves-light" type="submit">Iniciar sesion</button>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-sm-7 m-t-20">
                                                        @if (Route::has('password.request'))
                                                            <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> ¿Olvidaste tu contraseña?</a>
                                                        @endif    
                                                    </div>
                                                    <div class="col-sm-5 m-t-20">
                                                        <a href="{{ route('register')}}" class="text-muted"><i class="mdi mdi-account-circle"></i> Crear una cuenta</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>    
            </div>
        </div>
    </div>
</body>

@toastr_js
@toastr_render   
</html>
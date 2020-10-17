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

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('template/assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap-material-design.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    @toastr_css

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

</head>
<body>
    <!-- Navigation Bar-->
    <header id="topnav">
        @include('layouts.top-menu')
        @if(Auth::user()->estado == 1)
            @include('layouts.top-sub-menu')
        @endif
    </header>
    <!-- end topbar-main -->
    @if(Auth::user()->estado == 1)
        @yield('content')
    @elseif(Auth::user()->estado == 2)
        <br><br><br>
        <br><br><br>
        <div class="wrapper-page">
        <div class="display-table-cell">
        <diV class="container">
            <div class="card">
            <div class="card-body">
                <div class="text-center pt-6">
                    <h2><center><p>Su cuenta se encuentra desabilitada, contáctese con la administración vecinal para activar su cuenta.</p></center></h2>
                </div>
                </div>
            </div>
        </div>
        </div>
        <br><br><br>
        <br><br><br>
        <br><br>
    @elseif(Auth::user()->estado == 3)    
        <br><br><br>
        <br><br><br>
        <div class="wrapper-page">
        <div class="display-table-cell">        
        <diV class="container">
            <div class="card">
            <div class="card-body">
                <div class="text-center pt-3">
                    <h2><center><p>Su cuenta se encuentra en estado de revisión.</p></center></h2>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <br><br><br>
        <br><br><br>
        <br><br>
    @endif
    <div class="sidenav-overlay"></div>

    <div class="drag-target"></div>
    @toastr_js
    @toastr_render

    @include('layouts.footer')
</body>
</html>
@extends('layouts.app')

@section('content')
@toastr_css
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Noticias</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-sm-7 mx-auto">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h2 class="mt-0 header-title">{{ $noticias->titulo }}</h2>
                        <h6 class="mt-0 header">{{ $noticias->descripcion_corta }}</h6>
                        <p class="text-muted font-14"><?php echo "$noticias->descripcion_larga"; ?></p> 
                        <br>
                        <div class="">
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer float-left">Creador: <cite title="Source Title">
                                    @foreach($users as $user)
                                        @if($noticias->user_created_id == $user->id )
                                            {{ $user->name }}
                                        @endif
                                    @endforeach
                                </cite></footer>
                            </blockquote>
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer float-right">Fecha de noticia: <cite title="Source Title">{{ \Carbon\Carbon::parse($noticias->created_at)->format('d-m-yy') }}</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>
@toastr_js
@toastr_render

<script src="{{ asset('template/assets/js/app.js') }}"></script>

@endsection
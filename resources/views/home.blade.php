@extends('layouts.app')

@section('content')
@toastr_css

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title"></h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card bg-danger m-b-30">
                    <div class="card-body">
                        <div class="d-flex row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-google-physical-web"></i>
                                </div>
                            </div>
                            <div class="col-8 ml-auto align-self-center text-center">
                                <div class="m-l-10 text-white float-right">
                                    <h5 class="mt-0 round-inner">48</h5>
                                    <p class="mb-0 ">Visitas de hoy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-info m-b-30">
                    <div class="card-body">
                        <div class="d-flex row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-8 text-center ml-auto align-self-center">
                                <div class="m-l-10 text-white float-right">
                                    <h5 class="mt-0 round-inner">326</h5>
                                    <p class="mb-0 ">Socios registrados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-success m-b-30">
                    <div class="card-body">
                        <div class="d-flex row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-home"></i>
                                </div>
                            </div>
                            <div class="col-8 ml-auto align-self-center text-center">
                                <div class="m-l-10 text-white float-right">
                                    <h5 class="mt-0 round-inner">150</h5>
                                    <p class="mb-0 ">Viviendas registradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary m-b-30">
                    <div class="card-body">
                        <div class="d-flex row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-calculator"></i>
                                </div>
                            </div>
                            <div class="col-8 ml-auto align-self-center text-center">
                                <div class="m-l-10 text-white float-right">
                                    <h5 class="mt-0 round-inner">$825631</h5>
                                    <p class="mb-0">Ahorro total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>    

<script src="{{ asset('template/assets/js/app.js') }}"></script>

@toastr_js
@toastr_render
@endsection

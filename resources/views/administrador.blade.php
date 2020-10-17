@extends('layouts.app')

@section('content')
<!-- DataTables -->
<link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .hover:hover{
        background-color: #4558BE;
        color: #FFFFFF;
    }
</style>
<div class="wrapper">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title"></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 mx-auto offset-1">                
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">ADMINISTRACIÓN</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-12 col-md-2 mt-3">                
                <div class="card text-center">
                    <a href="{{ route('usuarios.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-users fa-4x"></i>
                            <h5 class="card-title">Usuarios</h5>
                        </div>
                    </a>
                </div>                                                                                   
            </div>    
            <div class="col-sm-12 col-md-2 mt-3">
                <div class="card text-center">
                    <a href="{{ route('viviendas.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-home fa-4x"></i>
                            <h5 class="card-title">Viviendas</h5>
                        </div>
                    </a>
                </div>                
            </div>        
            <div class="col-sm-2 mt-3">
                <div class="card text-center">
                    <a href="{{ route('noticias.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-newspaper-o fa-4x"></i>
                            <h5 class="card-title">Noticias</h5>
                        </div>
                    </a>
                </div>                                                                                      
            </div>   
            <div class="col-sm-2 mt-3">
                <div class="card text-center">
                    <a href="{{ route('eventos.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-bullhorn fa-4x"></i>
                            <h5 class="card-title">Eventos</h5>
                        </div>
                    </a>
                </div>   
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-2 mt-3">
                <div class="card text-center">
                    <a href="{{ route('formularioscontactos.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-id-card fa-4x"></i>
                            <h5 class="card-title">Formulario de contacto</h5>
                        </div>
                    </a>
                </div>  
            </div>
            <div class="col-sm-2 mt-3">
                <div class="card text-center">
                    <a href="{{ route('tipoEventos.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-calendar fa-4x"></i>
                            <h5 class="card-title">Tipo de <br>eventos</h5>
                        </div>
                    </a>
                </div>                                                                                                    
            </div>
            <div class="col-sm-2 mt-3">
                <div class="card text-center">
                    <a href="{{ route('tipoConsultas.index') }}">
                        <div class="card-body hover">
                            <i class="fa fa-book fa-4x"></i>
                            <h5 class="card-title">Tipo de <br>consultas</h5>
                        </div>
                    </a>
                </div>  
            </div>
            <div class="col-sm-2 mt-3">
                <div class="card text-center">
                    <a href="#">
                        <div class="card-body hover">
                            <i class="fa fa-bank fa-4x"></i>
                            <h5 class="card-title">Listado de <br> cuotas</h5>
                        </div>
                    </a>
                </div>  
            </div>
        </div>
    </div> <!-- end container -->
</div>
<br>
<!-- Required datatable js -->
<script src="{{ asset('template/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('template/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('template/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>

@endsection

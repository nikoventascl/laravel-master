@extends('layouts.app')

@section('content')
<!-- DataTables -->
<link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active">Datatable</li>
                        </ol>
                    </div>
                -->
                    <h4 class="page-title"></h4>
                </div>
            </div>

        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <!-- @if(Session::has('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Bien hecho!</strong> {{ Session::get('success') }}.
                </div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error!</strong> {{ Session::get('error') }}.
                </div>
                @endif -->
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="float-left">
                            <h4 class="mt-0 header-title">Noticias</h4>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('noticias.create') }}" class="btn btn-primary float-left">Crear noticia</a>
                        </div>
                        <div class="pt-5">
                            <p class="text-muted font-14">En esta pantalla podrás visualizar la lista de noticias</code>
                            </p> 
                        </div>                        
                        <div class="pt-0">
                            <table id="datatable" class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titulo</th>
                                        <th>Creada por</th>
                                        <th>Actualizada por</th>
                                        <th>Fecha de creación</th>
                                        <th>Fecha de actualización</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>                                    
                                <tbody>
                                    @if(count($noticias) > 0)
                                        @foreach($noticias as $noticia)
                                        <tr>
                                            <td>{{ $noticia->id }}</td>
                                            <td>{{ $noticia->titulo }}</td>
                                            <td>
                                                @foreach($users as $user)
                                                    @if($noticia->user_created_id == $user->id )
                                                        {{ $user->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($users as $user)
                                                    @if($noticia->user_updated_id == $user->id )
                                                        {{ $user->name }}
                                                    @endif
                                                @endforeach
                                                @if($noticia->user_updated_id == 0)
                                                    {{ __('Noticia no actualizada') }}
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($noticia->created_at)->format('d-m-yy h:i:s') }}</td>
                                            <td>
                                                @if($noticia->updated_at == $noticia->created_at)
                                                    {{ __('Noticia no actualizada') }}
                                                @else
                                                    {{ \Carbon\Carbon::parse($noticia->updated_at)->format('d-m-yy h:i:s') }}
                                                @endif
                                                
                                            </td>
                                            <td class="text-center">
                                                @if($noticia->estado == 1)                                                     
                                                    <a id="{{ $noticia->id }}" href="" class="estado" title="Click para cambiar estado">
                                                        <i class="fa fa-check fa-2x text-success"></i>
                                                    </a>
                                                @else 
                                                    <a id="{{ $noticia->id }}" href="" class="estado" title="Click para cambiar estado">
                                                        <i class="fa fa-window-close fa-2x text-danger mb-0"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>              
                                                <div class="float-right">
                                                    <div class="icon-demo-content row">
                                                        <a href="{{ route('noticias.edit', $noticia->id) }} " title="Editar noticia">
                                                            <div class="col-sm-6 m-0">
                                                                <i class="mdi mdi-table-edit m-0"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>                        
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
@toastr_js
@toastr_render

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

<script>
$(document).ready(function(){
    $('.estado').click(function(e){
        e.preventDefault();
        var id = this.id;
        $.ajax({
            url: 'noticias/cambiarEstado',
            type:'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: id},
            success: function(data){
                console.log(data);
                if(data.code == 400){
                    alert('error 400');
                }else if(data.code == 401){
                    alert('error 401');
                }else if(data.code == 200){ 
                    if(data.noticias.estado == 2){
                        $('#'+id).find('.fa-check').removeClass('fa-check').addClass('fa-window-close');
                        $('#'+id).find('.text-success').removeClass('text-success').addClass('text-danger');
                        toastr.success('Cambiaste el estado exitosamente!', 'Muy bien!', {"showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000});
                    }else if(data.noticias.estado == 1){
                        $('#'+id).find('.fa-window-close').removeClass('fa-window-close').addClass('fa-check');
                        $('#'+id).find('.text-danger').removeClass('text-danger').addClass('text-success');
                        toastr.success('Cambiaste el estado exitosamente!', 'Muy bien!', {"showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000});
                    }
                }
            },
            error: function(data, textStatus, errorThrown){
                if(data.status >= 500 || data.status < 600){
                    toastr.error('Se ha producido un error.', 'Error!', {"showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000});
                }else if(data.status == 419){
                    window.location.href = 'login';
                }
            },
        });
    });
});
</script>

@endsection
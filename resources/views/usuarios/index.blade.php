@extends('layouts.app')

@section('content')
<!-- DataTables -->
<link href="{{ asset('template/assets/css/sweetalert2.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">

</style>
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
                            <h4 class="mt-0 header-title">Usuarios</h4>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-primary float-left">Crear Usuario</a>
                        </div>
                        <div class="pt-5">
                            <p class="text-muted font-14">En esta pantalla podrás visualizar la lista de usuarios</code>
                            </p> 
                        </div>        
               
                        <div class="pt-0">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Rut</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Fecha nacimiento</th>
                                        <th>Vivienda</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>                                    
                                <tbody>
                                    @if(count($usuarios) > 0)
                                        @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->apellido }}</td>
                                            <td>{{ $usuario->rut }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if($usuario->telefono != 0)
                                                    {{ $usuario->telefono }}
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d-m-yy') }}</td>
                                            <td>
                                                @foreach($viviendas as $vivienda)
                                                    @if($usuario->vivienda_id == $vivienda->id )
                                                        {{ $vivienda->direccion }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @if($usuario->estado == 1)
                                                    <a id="{{ $usuario->id }}" href="" data-estado="{{ $usuario->estado }}" class="estado" title="Click para cambiar estado">
                                                        <label hidden>Habilitado</label>
                                                        <i class="fa fa-check fa-2x text-success"></i>
                                                    </a>
                                                @elseif($usuario->estado == 2)
                                                    <a id="{{ $usuario->id }}" href="" data-estado="{{ $usuario->estado }}" class="estado" title="Click para cambiar estado">
                                                        <label hidden>Desactivado</label>
                                                        <i class="fa fa-window-close fa-2x text-danger mb-0"></i>
                                                    </a>
                                                @elseif($usuario->estado == 3)
                                                    <a id="{{ $usuario->id }}" href="" data-estado="{{ $usuario->estado }}" class="estado" title="Click para aprobar al usuario">
                                                    <label hidden>Por Aprobar</label>
                                                        <i class="fa fa-user-plus fa-2x text-info mb-0"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>              
                                                <div class="float-right">
                                                    <div class="icon-demo-content row">
                                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" title="Editar usuario">
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


<script src="{{ asset('template/assets/js/sweetalert2.js') }}"></script>


<script>
$(document).ready(function(){

    var $tabla = $('.table-bordered');

    $(window).resize(function() {
        if (window.innerWidth <= 800){
            $tabla.addClass('table-responsive');
        } 
        else{
            $tabla.removeClass('table-responsive');
        } 
    });

    $('.estado').click(function(e){
        e.preventDefault();
        var id = this.id;
        var estado = $(this).data('estado');        
        if(estado == 1){
            estado = 2;
        }else if(estado == 2){
            estado = 1;
        }else if(estado == 3){
            estado = 1;
            Swal.fire({
                title: '¿Seguro que deseas aprobar este usuario?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No, cancelar',
                confirmButtonText: 'Si, aprobar'
            }).then((result) => {
                if(result.isConfirmed){
                    cambiarEstado(id, estado);
                    Swal.fire(
                        'Aprobado',
                        'El usuario fue aprobado exitosamente!',
                        'success',
                    )
                }
            })
            return false;
        }
        cambiarEstado(id, estado);
    });
});

function cambiarEstado(id, estado){
    $.ajax({
        url: 'usuarios/cambiarEstado',
        type:'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id: id, estado: estado},
        success: function(data){
            if(data.code == 400){
                toastr.error('Se ha producido un error 400.', 'Error!', {"showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000});
            }else if(data.code == 401){
                toastr.error('Se ha producido un error 401.', 'Error!', {"showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000});
            }else if(data.code == 200){
                if(data.usuarios.estado == 2){                    
                    $('#'+id).find('.fa-check').removeClass('fa-check').addClass('fa-window-close');
                    $('#'+id).find('.text-success').removeClass('text-success').addClass('text-danger');
                    $('#'+id).data('estado', 2);
                    toastr.success('Cambiaste el estado exitosamente!', 'Muy bien!', {"showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000});
                }else if(data.usuarios.estado == 1){
                    $('#'+id).find('.fa-window-close').removeClass('fa-window-close').addClass('fa-check');
                    $('#'+id).find('.fa-user-plus').removeClass('fa-user-plus').addClass('fa-check');
                    $('#'+id).find('.text-danger').removeClass('text-danger').addClass('text-success');
                    $('#'+id).find('.text-info').removeClass('text-info').addClass('text-success');
                    $('#'+id).data('estado', 1);
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
}
</script>

@endsection
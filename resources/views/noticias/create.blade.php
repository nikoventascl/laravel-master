@extends('layouts.app')

@section('content')

<!-- Dropzone css -->
<link href="{{ asset('template/assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/css/sweetalert2.css') }}" rel="stylesheet">

<style>
    .mdi-close {
        color: red;
    }
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
                                            <h4 class="mt-0 header-title">Datos de la noticia</h4>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="alert alert-danger alert-dismissible fade show">Todos los campos son requeridos</p>
                                        </div>
                                        <div class="general-label">
                                            <form method="POST" action="{{ route('noticias.store') }}" class="mb-0" enctype="multipart/form-data">
                                            @csrf
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="titulo" class="bmd-label-floating ">Titulo</label>
                                                        <input type="text" class="form-control" id="alloptions" name="titulo" maxlength="50" value="{{ old('titulo') }}" autofocus>
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
                                                        <input type="text" class="form-control" id="alloptions" name="descripcion_corta" maxlength="100" value="{{ old('descripcion_corta') }}" autofocus>
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
                                                <button type="button" style="left:1.5%" id="nuevaImagen" class="btn btn-raised btn-primary">Agregar imagen</button>

                                                <div class="col-sm-12">
                                                    <table id="tablaElementos" class="table mb-0">
                                                        <thead class="thead-default">
                                                            <tr>
                                                                <th>Nombre imagen</th>
                                                                <th>Imagen</th>
                                                                <th class="text-right">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h5 class="mt-0 header-title">Descripcion larga</h5>
                                                        <textarea id="elm1" name="descripcion_larga" maxlength="10000" autofocus>{{ old('descripcion_larga') }}</textarea>
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
                                                </div>
                                                <div class="col-sm-6">
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
                                                <button type="submit" style="left:1.5%" class="btn btn-primary btn-raised mb-0">Crear noticia</button>
                                                <a href="{{ route('noticias.index') }}" style="left:2.5%" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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

<div id="modal-agregar-imagen" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalform">Subir Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" class="dropify" id="imagen" name="imagen">
                </div>
            </div>                                          
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btn-modal-agregar-imagen" class="btn btn-raised btn-primary ml-2">Subir imagen</button>
            </div>
        </div>        
    </div>
</div>
@toastr_js
@toastr_render
<!-- Dropzone js -->
<script src="{{ asset('template/assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/upload-init.js') }}"></script>

<!--Wysiwig js-->   
<script src="{{ asset('template/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/form-editor-init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('template/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- Plugins Init js -->
<script src="{{ asset('template/assets/pages/form-advanced.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script src="{{ asset('template/assets/js/sweetalert2.js') }}"></script>
<script>
    var idElemento = 0;
    $(document).ready(function(){
        $('#nuevaImagen').click(function(e){
            e.preventDefault();
            $('#modal-agregar-imagen').modal('show');
        });

        $('.borrar').click(function(e){
            e.preventDefault();
            var elemento = this.id.split('_');
            var idElemento = elemento[1];
            $('#tr_'+idElemento).remove();
        });

        $('#btn-modal-agregar-imagen').click(function(e){
            e.preventDefault();
            if($('#imagen').val() != ''){
                subirImagen();
            }else{
                toastr.error('Debe seleccionar una imagen.');
            }
        });
    });

    $(document).on("click", '.capture-url', function(e){
        e.preventDefault();

        var link = $(this).data('url');
        var inputFalso = document.createElement('input');
        inputFalso.setAttribute("value", link);
        document.body.appendChild(inputFalso);
        inputFalso.select();
        document.execCommand('copy');
        document.body.removeChild(inputFalso);
        
        toastr.info('Imagen copiada en portapapeles');
    });       

    $(document).on("click", '.delete-img', function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas eliminar la imagen?',
            text: "No se podran revertir los cambios",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No, cancelar',
            confirmButtonText: 'Si, eliminar'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Eliminada',
                'La imagen fue eliminada con exito',
                'success',
                )

                var idElemento = $(this).data('id')
                $('#tr_'+idElemento).remove();
            }
        })
    });       

    function subirImagen(){
        var imagen  = $('#imagen').prop('files')[0];
        var formData = new FormData();        
        formData.append('imagen', imagen);
        $.ajax({
            url: '{{ route('imagenes.subirImagen') }}',
            method: 'post',
            data: formData,
            contentType : false,
            processData : false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                idElemento++;
                
                var url = window.location.href.replace('/noticias/create', '')+'/'+response.ruta+response.nombre;
                console.log(url);

                $('#tablaElementos tbody').append(
                '<tr id="tr_'+idElemento+'" data-id="'+idElemento+'">'+
                    '<td>'+response.nombreOrigen+'</td>'+
                    '<td><img style="height: 40px;" src="'+url+'" class=""></img></td>'+
                    '<td>'+
                        '<div class="float-right"><div class="icon-demo-content row"><a data-id="'+idElemento+'" href="" class="delete-img" title="Eliminar imagen"><div class="col-sm-6 m-0"><i class="mdi mdi-close"></i></div></a></div></div>'+
                        '<div class="float-right"><div class="icon-demo-content row"><a data-url="'+url+'" href="" class="capture-url" title="Copiar en portapapeles"><div class="col-sm-6 m-0"><i class="mdi mdi-link"></i></div></a></div></div>'+
                    '</td>'+
                '</tr>');
                $('#imagen').val('');
                $('#modal-agregar-imagen').modal('hide');
                toastr.success('Imagen subida con exito.');
            },
            error: function(error){
                console.log(error);
                toastr.error('Error al cargar la imagen');
            }
        });
    }
</script>
@endsection
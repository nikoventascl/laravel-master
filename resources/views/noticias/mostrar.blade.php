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
        <div class="row">
            <div class="card col-sm-8 mx-auto bg-light">
                <div class="card-header">
                    <h4 class="page-title">Avisos/Noticias</h4>
                </div>
                <div class="card-body">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $noticias->links() }}
                        </ul>    
                    </nav>
                    @if(count($noticias) > 0)
                        @foreach($noticias as $noticia)
                        <div class="col-sm-8 mx-auto">
                            <div class="card m-b-20 shadow">
                                <a href="{{ route('noticias.show', $noticia->id) }}">
                                    <div class="card-header">
                                        <h3 class="mt-0 header-title">{{ $noticia->titulo }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                        <p>{{ $noticia->descripcion_corta }}</p>
                                        <footer class="blockquote-footer"><cite title="Source Title"><small>Editada el {{ $noticia->created_at }}</small></cite></footer>
                                        </blockquote>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $noticias->links() }}
                        </ul>    
                    </nav>
                </div>
            </div>
        </div><!--end row-->
    </div>
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

@endsection
@extends('layouts.app')

@section('content')
@toastr_css
<div class="wrapper">
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Mis pagos</h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pagado-tab" data-toggle="tab" href="#pagado" role="tab" aria-controls="pagado" aria-selected="true">Cuotas Pendientes</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pendiente-tab" data-toggle="tab" href="#pendiente" role="tab" aria-controls="pendiente" aria-selected="false">Cuotas Pagadas</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pagado" role="tabpanel" aria-labelledby="pendiente-tab">
                                <div class="pt-0">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Cuota</th>
                                                <th>Monto</th>
                                                <th>Fecha de vencimiento</th>
                                                <th class="text-right">Pagar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mensualidad Junio</td>
                                                <td>$100.000</td>
                                                <td>25-06-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal1">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Julio</td>
                                                <td>$100.000</td>
                                                <td>25-07-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal2">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Agosto</td>
                                                <td>$5.000</td>
                                                <td>25-08-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal3">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Septiembre</td>
                                                <td>$100.000</td>
                                                <td>25-09-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal4">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Octubre</td>
                                                <td>$100.000</td>
                                                <td>25-10-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal5">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Noviembre</td>
                                                <td>$100.000</td>
                                                <td>25-11-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal6">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Diciembre</td>
                                                <td>$100.000</td>
                                                <td>25-12-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#" data-toggle="modal" data-target="#pagoModal7">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="mdi mdi-coin m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="pagoModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content col-sm-12">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Junio con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pagoModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Julio con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pagoModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Agosto con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pagoModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Septiembre con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pagoModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Octubre con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pagoModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Noviembre con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pagoModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="template/assets/images/webpay.png">
                                            <h5 class="modal-title" id="exampleModalLabel">Pagar Cuota</h5>
                                            Se realizara el pago del mes de Diciembre con un monto correspondiente a $100.000
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pendiente" role="tabpanel" aria-labelledby="pendiente-tab">
                                <div class="pt-0">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Cuota</th>
                                                <th>Monto</th>
                                                <th>Fecha del Pago</th>
                                                <th class="text-right">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mensualidad enero</td>
                                                <td>$100.000</td>
                                                <td>15-01-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="fa fa-check fa-2x text-success m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Febrero</td>
                                                <td>$100.000</td>
                                                <td>12-02-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="fa fa-check fa-2x text-success m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Marzo</td>
                                                <td>$100.000</td>
                                                <td>20-03-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="fa fa-check fa-2x text-success m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Abril</td>
                                                <td>$100.000</td>
                                                <td>05-04-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="fa fa-check fa-2x text-success m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mensualidad Mayo</td>
                                                <td>$100.000</td>
                                                <td>24-05-2020</td>
                                                <td>
                                                    <div class="float-right">
                                                        <div class="icon-demo-content row">
                                                            <a href="#">
                                                                <div class="col-sm-6 m-0">
                                                                    <i class="fa fa-check fa-2x text-success m-0"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@toastr_js
@toastr_render
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



<!-- App js -->
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>
@endsection
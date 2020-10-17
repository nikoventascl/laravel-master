@extends('layouts.app')

@section('content')

<!--calendar css-->
<link href="{{ asset('template/assets/fullcalendar/packages/core/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/daygrid/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/timegrid/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/list/main.css') }}" rel="stylesheet" />
<style type="text/css">
    @media only screen and (min-width: 1025px) {

        .card.m-b-50{
            width: 80rem;
            left: 14rem;
        }
    }    
</style>


<style type="text/css">
    .fc-toolbar.fc-header-toolbar {
        margin-bottom: 0.5em !important;
    }

    @media only screen and (max-width: 600px) {
        .fc-toolbar {        
            display: contents;
        }

        .wrapper{
            padding-top: 9rem;
        }

        .fc-center{
            position: relative;
            bottom: -4.5rem;
        }

        .fc-right{
            position: relative;
            bottom: 1rem;
        }

        .fc-view-container{
            position: absolute;
            bottom: -14rem;
        }

        .fc-nuevoEvento-button{
            position: relative;
            bottom: -0.8rem;
            left: -0.65rem;
        }

        .card{
            height: 30rem;
        }
    }

    
</style>
@toastr_css
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-50">
                    <div class="card-body">
                        <h4 class="page-title">Calendario</h4>
                        <div class="row">
                            <div id='calendar' class="col-xl-12 col-lg-9 col-md-8"></div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<div id="modal-evento" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalform">Datos de evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row grid-col p-3">
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <h6>Titulo</h6>
                            <div id="eTitulo"></div>
                        </div>
                    </div>
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <h6>Descripcion corta</h6>
                            <div id="eDesc_corta"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12"> 
                    <div class="form-group">
                        <h6>Descripcion larga</h6>
                        <div id="eDesc_larga"></div>
                    </div>
                </div>
                <div class="row grid-col p-3">
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <h6>Fecha de inicio</h6>
                            <div id="eFecha_ini"></div>
                        </div>
                    </div>
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <h6>Hora de inicio</h6>
                            <div id="eHora_ini"></div>
                        </div>
                    </div>
                </div>
                <div class="row grid-col p-3">
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <h6>Fecha de Termino</h6>
                            <div id="eFecha_term"></div>
                        </div>
                    </div>
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <h6>Hora de Termino</h6>
                            <div id="eHora_term"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="form-group">
                        <h6>Lugar de encuentro</h6>
                        <div id="elugar"></div>
                    </div>
                </div>
            </div>                                          
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>        
    </div>
</div>
@toastr_js
@toastr_render
<!-- Codigo fullcalendar -->
<script src="{{ asset('template/assets/fullcalendar/packages/core/main.js') }}"></script>
<script src="{{ asset('template/assets/fullcalendar/packages/daygrid/main.js') }}"></script>
<script src="{{ asset('template/assets/fullcalendar/packages/timegrid/main.js') }}"></script>

<!-- Plugins fullcalendar -->
<script src="{{ asset('template/assets/fullcalendar/packages/list/main.js') }}"></script>
<script src="{{ asset('template/assets/fullcalendar/packages/interaction/main.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/plugins/timepicker/moment-with-locales.js') }}">
    moment.locale('es');
</script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
    $("#calendar").width(750).css({'margin-left': 'auto','margin-right': 'auto'});

    document.addEventListener('DOMContentLoaded', function() {
        var permiteCrear = false;
        @hasanyrole('Super Administrador|Administrador|Ejecutivo')
            permiteCrear = true;
        @endhasanyrole
        var calendarEl = document.getElementById('calendar');
        if(permiteCrear){
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],
                defaultView:'dayGridMonth',
                header:{
                    left:'prev,next today nuevoEvento',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay'
                },
                firstDay: 1,
                customButtons:{
                    nuevoEvento:{
                        text:"Crear nuevo evento",
                        click:function(){
                            window.location.href = "{{ route('eventos.create') }}"
                        }
                    }
                },
                views: {
                    month: {
                        columnFormat: 'ddd'
                    }
                },
                /*
                dateClick:function(info){
                    toastr.info("Datos del dia");
                    console.log(info);
                    calendar.addEvent({
                        title:"Evento x",
                        date:info.dateStr
                    });
                },
                */
                eventClick:function(info){

                    $('#eTitulo').html(info.event.title);
                    $('#eDesc_corta').html(info.event.extendedProps.descripcion_corta);
                    $('#eDesc_larga').html(info.event.extendedProps.descripcion_larga);
                    $('#eFecha_ini').html(moment(info.event.start).format("DD-MM-YYYY"));
                    $('#eHora_ini').html(moment(info.event.start).format("HH:mm:ss"));
                    $('#eFecha_term').html(moment(info.event.end).format("DD-MM-YYYY"));
                    $('#eHora_term').html(moment(info.event.end).format("HH:mm:ss"));
                    $('#elugar').html(info.event.extendedProps.lugar);

                    $('#modal-evento').modal();
                },
                events:"{{ url('/calendario/show')}}"
            });
        }else{
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],
                defaultView:'dayGridMonth',
                header:{
                    left:'prev,next today nuevoEvento',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay'
                },
                firstDay: 1,
                /*
                dateClick:function(info){
                    toastr.info("Datos del dia");
                    console.log(info);
                    calendar.addEvent({
                        title:"Evento x",
                        date:info.dateStr
                    });
                },
                */
                eventClick:function(info){

                    $('#eTitulo').html(info.event.title);
                    $('#eDesc_corta').html(info.event.extendedProps.descripcion_corta);
                    $('#eDesc_larga').html(info.event.extendedProps.descripcion_larga);
                    $('#eFecha_ini').html(moment(info.event.start).format("DD-MM-YYYY"));
                    $('#eHora_ini').html(moment(info.event.start).format("HH:mm:ss"));
                    $('#eFecha_term').html(moment(info.event.end).format("DD-MM-YYYY"));
                    $('#eHora_term').html(moment(info.event.end).format("HH:mm:ss"));
                    $('#elugar').html(info.event.extendedProps.lugar);

                    $('#modal-evento').modal();
                },
                events:"{{ url('/calendario/show')}}"
            });
        }
        calendar.setOption('locale','Es')
        calendar.render();
    });
</script>
@endsection
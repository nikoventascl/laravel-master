@extends('layouts.app')

@section('content')
@toastr_css
<style>
    body {
        background: #E5DDD5 url("https://www.toptal.com/designers/subtlepatterns/patterns/sports.png") fixed;
    }
    .page-header {
        background: #006A4E;
        margin: 0;
        padding: 20px 0 10px;
        color: #FFFFFF;
        position: fixed;
        width: 100%;
        z-index: 1
    }
    .main {
        
    }

    .chat-log {        
        height: auto;
        overflow: auto;
    }
    .chat-log__item {
        background: #fafafa;
        padding: 10px;
        margin: 0 auto 20px;
        max-width: 80%;
        float: left;
        border-radius: 4px;
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
        clear: both;
    }

    .chat-log__item.chat-log__item--own {
        float: right;
        background: #DCF8C6;
        text-align: right;
    }

    .chat-form {
        background: #DDDDDD;
        padding: 40px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .chat-log__author {
        margin: 0 auto .5em;
        font-size: 14px;
        font-weight: bold;
    }

    .alto-dialog{
        height: 500px;
    }
</style>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box">
                    <h4 class="page-title"></h4>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card m-b-30">
                    <h3 class="card-header">
                        Consulta sobre "Vivienda"
                    </h3>
                    <div class="card-body">
                        <div class="card table table-responsive">
                            <div class="card-body alto-dialog">
                                <div class="main">
                                    <div class="container ">
                                        <div class="chat-log">

                                            <div class="chat-log__item">
                                                <h3 class="chat-log__author">Felipe <small>14:30</small></h3>
                                                <div class="chat-log__message">Hola, quisiera hacer una consulta</div>
                                            </div>

                                            <div class="chat-log__item chat-log__item--own">
                                                <h3 class="chat-log__author">Fabrício <small>14:30</small></h3>
                                                <div class="chat-log__message">Hola. ¿dime que puedo ayudarte?</div>
                                            </div>

                                            <div class="chat-log__item">
                                                <h3 class="chat-log__author">Felipe <small>14:31</small></h3>
                                                <div class="chat-log__message">¿Me gustaria saber como puedo registrar mi vivienda?</div>
                                            </div>

                                            <div class="chat-log__item chat-log__item--own">
                                                <h3 class="chat-log__author">Fabrício <small>14:31</small></h3>
                                                <div class="chat-log__message">Puedes pedirle alagun administrador que registre tu vivienda</div>
                                            </div>      

                                            <div class="chat-log__item">
                                                <h3 class="chat-log__author">Felipe <small>14:32</small></h3>
                                                <div class="chat-log__message">Okay, muchas gracias!!</div>
                                            </div>

                                            <div class="chat-log__item chat-log__item--own">
                                                <h3 class="chat-log__author">Fabrício <small>14:32</small></h3>
                                                <div class="chat-log__message">Cualquier duda puedes contactarnos,saludos!!</div>
                                            </div>   

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Escribe un mensaje" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary bmd-btn-fab">
                                        <i class="mdi mdi-send"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('template/assets/js/app.js') }}"></script>
@toastr_js
@toastr_render
@endsection
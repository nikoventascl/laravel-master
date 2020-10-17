<div class="topbar-main">
    <div class="container-fluid">

        <!-- Logo container-->
        <div class="logo">
            <!-- Text Logo -->
            <!--<a href="{{ url('/') }}" class="logo">-->
            <!--Urora-->
            <!--</a>-->
            <!-- Image Logo -->
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('template/assets/images/Captura2.png') }}" alt="" width="45%" class="img-fluid">
            </a>

        </div>
        <!-- End Logo container-->


        <div class="menu-extras topbar-custom">
            
            <ul class="list-inline float-right mb-0 ">
                <!-- language-->
                @if(Auth::user()->estado == 1)
                <li class="list-inline-item dropdown notification-list">
                    <div class="list-inline-item hide-phone app-search">
                        <form role="search" class="">
                            <div class="form-group pt-1"> 
                                <input type="text" class="form-control" placeholder="Buscar..">
                                <a href=""><i class="fa fa-search"></i></a>
                            </div>
                        </form>
                    </div>   
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="ti-email noti-icon"></i>
                        <span class="badge badge-danger heartbit  noti-icon-badge">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title align-self-center">
                            <h5><span class="badge badge-danger float-right">5</span>Mensajes</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon"><img src="{{ asset('template/assets/images/users/avatar-2.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                            <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon"><img src="{{ asset('template/assets/images/users/avatar-3.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                            <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon"><img src="{{ asset('template/assets/images/users/avatar-4.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                            <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                        </a>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            Ver Todos
                        </a>

                    </div>
                </li>

                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="ti-bell noti-icon"></i>
                        <span class="badge badge-success a-animate-blink noti-icon-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><span class="badge badge-danger float-right">3</span>Notificaciones</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                        </a>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            Ver Todas
                        </a>

                    </div>
                </li>
                @endif
                <li class="list-inline-item dropdown notification-list">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('template/assets/images/users/avatar-m-5.png') }}" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                            @if(Auth::user()->estado == 1)
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Perfil</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-settings m-r-5 text-muted"></i>Configuración</a>
                            <!--<a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i>Bloquear</a>-->
                            <div class="dropdown-divider"></div>                            
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="mdi mdi-logout m-r-5 text-muted"></i>Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>                                                                    
                    </div>
                </li>
                <li class="menu-item list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link" id="mobileToggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>    
            </ul> 
            
        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

    </div> <!-- end container -->
</div>
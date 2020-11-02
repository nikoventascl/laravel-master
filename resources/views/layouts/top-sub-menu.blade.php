<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu text-center">
                <li class="has-submenu ">
                    <a href="{{ route('home') }}"><i class="mdi mdi-home"></i>Home</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('viviendas.index') }}"><i class="mdi mdi-home-variant"></i>Vivienda</a>
                </li>
                

                <!--
                @hasanyrole('Super Administrador|Administrador|Ejecutivo')
                    <li class="has-submenu">
                        <a href="{{ route('administrador') }}"><i class="mdi mdi-cards"></i>Administración</a>
                    </li>
                @endhasanyrole
                -->
            </ul><!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>
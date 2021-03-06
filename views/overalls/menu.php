<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="imagenes/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ingetronik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="imgEmpresa" src="imagenes/empresa2.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" id="nombreEmp">Ingetronik</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item" id="homeMenu">
                    <a href="#" onclick="ruta('home')" class="nav-link" id="btnHomeMenu">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="usuariosMenu">
                    <a href="#" onclick="ruta('usuarios')" class="nav-link" id="btnUsuariosMenu">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="usuariosEMenu">
                    <a href="#" onclick="ruta('usuariosE')" class="nav-link" id="btnUsuariosEMenu">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="empresasMenu">
                    <a href="#" onclick="ruta('empresas')" class="nav-link" id="btnEmpresasMenu">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Empresas
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="sedesMenu">
                    <a href="#" onclick="ruta('sedes')" class="nav-link" id="btnSedesMenu">
                        <i class="nav-icon far fa-building"></i>
                        <p>
                            Sedes
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="sedesEMenu">
                    <a href="#" onclick="ruta('sedesE')" class="nav-link" id="btnSedesEMenu">
                        <i class="nav-icon far fa-building"></i>
                        <p>
                            Sedes
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="slidersMenu">
                    <a href="#" onclick="ruta('sliders')" class="nav-link" id="btnSlidersMenu">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Sliders
                        </p>
                    </a>
                </li>
<!--                <li class="nav-item" id="configuracionEMenu">
                    <a href="#" onclick="ruta('configuracionE')" class="nav-link" id="btnConfiguracionEMenu">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Configuración
                        </p>
                    </a>
                </li>-->
                <li class="nav-item" id="reportesEMenu">
                    <a href="#" onclick="ruta('reportesE')" class="nav-link" id="btnReportesEMenu">
                        <i class="nav-icon fa fa-print"></i>
                        <p>
                            Reportes
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview" id="graficasEMenu">
                    <a href="#" class="nav-link" id="btngraficasEMenu">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Graficas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="graficaChartE">
                        <li class="nav-item">
                            <a href="#" onclick="ruta('graficaChartE')" class="nav-link" id="btngraficaChartEMenu">
                                <i class="far fas fa-chart-bar nav-icon"></i>
                                <p>Grafica barras</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" id="graficaPieMenu">
                        <li class="nav-item">
                            <a href="#" onclick="ruta('graficaPieE')" class="nav-link" id="btngraficaPieEMenu">
                                <i class="far fas fa-chart-pie nav-icon"></i>
                                <p>Grafica torta</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

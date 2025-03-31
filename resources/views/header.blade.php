<!-- Top Navbar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3" href="{{ url('/home') }}">Saras Secret</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>
    <!-- Navbar Search (No habilitada)-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar User -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Configuraciones</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item" href="#!"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<!-- Contenedor del Sidebar y Panel de Contenido -->
<div id="layoutSidenav">
    <!-- Sidebar (ubicado a la izquierda) -->
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Sección: Páginas -->
                    <div class="sb-sidenav-menu-heading">Páginas</div>
                    <a class="nav-link" href="{{ url('/home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{ url('/clientes') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Clientes
                    </a>
                    <a class="nav-link" href="{{ url('/productos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                        Inventario
                    </a>
                    <a class="nav-link" href="{{ url('/carritos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Ventas
                    </a>
                    <a class="nav-link" href="{{ url('/pedidos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                        Envios
                    </a>
                    <a class="nav-link" href="{{ url('/products') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                        Api FakeStore
                    </a>
                    <!-- Sección: Perfil -->
                    <div class="sb-sidenav-menu-heading">Perfil</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        Sesión
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="#!">Cambiar contraseña</a>
                            <a class="nav-link" href="#!">Cerrar sesión</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                        Reportes
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                 data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#!">Diarias</a>
                                    <a class="nav-link" href="#!">Semanales</a>
                                    <a class="nav-link" href="#!">Mensuales</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <!-- Sección: Adicionales -->
                    <div class="sb-sidenav-menu-heading">Adicionales</div>
                    <a class="nav-link" href="#!">
                        <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                        Respaldo de base de datos
                    </a>
                    <a class="nav-link" href="#!">
                        <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                        Restauración de base de datos
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name ?? 'Usuario' }}
            </div>
        </nav>
    </div>
    <!-- Aquí termina el Sidebar; el panel de contenido se renderizará en el div siguiente -->
    <div id="layoutSidenav_content">
        @yield('panel-content')
    </div>
</div>


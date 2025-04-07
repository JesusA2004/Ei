<!-- Top Navbar personalizado para Sara's Secret -->
<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: var(--nav-bg);">
    <a class="navbar-brand ps-3 fw-bold" href="{{ url('/home') }}" style="color: var(--nav-text);">
        <i class="fas fa-spa me-2"></i>Sara's Secret
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-light" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-md-3 my-2 my-md-0"></form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                <li><a class="dropdown-item" href="#">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

<!-- Sidebar personalizado -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion shadow-sm" style="background-color: var(--sidebar-bg); color: var(--sidebar-text);" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Páginas -->
                    <div class="sb-sidenav-menu-heading" style="color: var(--sidebar-text);">Páginas</div>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="{{ url('/home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard
                    </a>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="{{ url('/clientes') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>Clientes
                    </a>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="{{ url('/productos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>Inventario
                    </a>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="{{ url('/carritos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Ventas
                    </a>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="{{ url('/pedidos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>Envios
                    </a>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="{{ url('/products') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>Api FakeStore
                    </a>

                    <!-- Perfil -->
                    <div class="sb-sidenav-menu-heading" style="color: var(--sidebar-text);">Perfil</div>
                    <a class="nav-link collapsed" style="color: var(--sidebar-text);" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        Sesión
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" style="color: var(--sidebar-text);" href="#">Cambiar contraseña</a>
                            <a class="nav-link" style="color: var(--sidebar-text);" href="#">Cerrar sesión</a>
                        </nav>
                    </div>

                    <!-- Reportes -->
                    <a class="nav-link collapsed" style="color: var(--sidebar-text);" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                        Reportes
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages">
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link collapsed" style="color: var(--sidebar-text);" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth">
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" style="color: var(--sidebar-text);" href="#">Diarias</a>
                                    <a class="nav-link" style="color: var(--sidebar-text);" href="#">Semanales</a>
                                    <a class="nav-link" style="color: var(--sidebar-text);" href="#">Mensuales</a>
                                </nav>
                            </div>
                        </nav>
                    </div>

                    <!-- Adicionales -->
                    <div class="sb-sidenav-menu-heading" style="color: var(--sidebar-text);">Adicionales</div>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                        Respaldo de base de datos
                    </a>
                    <a class="nav-link" style="color: var(--sidebar-text);" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                        Restauración de base de datos
                    </a>
                </div>
            </div>
            <!-- Footer del Sidebar -->
            <div class="sb-sidenav-footer" style="background-color: var(--sidebar-footer-bg); color: var(--sidebar-footer-text);">
                <div class="small">Sesión iniciada como:</div>
                {{ Auth::user()->name ?? 'Usuario' }}
            </div>
        </nav>
    </div>

    <!-- Panel de contenido principal -->
    <div id="layoutSidenav_content">
        @yield('panel-content')
    </div>
</div>


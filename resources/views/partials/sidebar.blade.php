<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="https://inscooruro.edu.bo/index.html" class="brand-link">
        <img src="{{ asset('dist/img/inscologo-sinfondo.png') }}" alt="INSCO" style="width: auto; height: 70px; border-radius: 5px; display: block; margin: 0 auto;">
        <span class="brand-text font-weight-light"></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->image && Storage::disk('public')->exists(Auth::user()->image))
                    <img src="{{ Storage::url(Auth::user()->image) }}" class="user-image img-circle elevation-2"
                        alt="{{ Auth::user()->name }}'s image">
                @else
                    <img src="{{ Storage::url('usuario_imagen/user_default.png') }}"
                        class="user-image img-circle elevation-2" alt="Default Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <span class="status-indicator"></span> <span class="status-text">En línea</span> <!-- Indicador de estado con texto -->
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Inicio
                            <span class="right badge badge-danger">Principal</span>
                        </p>
                    </a>
                </li>

                <!-- Periodos -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.periodos.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-arrows-alt-h"></i>
                        <p>
                            Periodos
                            <span class="right badge badge-success">Gestionar</span>
                        </p>
                    </a>
                </li>

                <!-- Gestión de Usuarios -->
                <li class="nav-item has-treeview {{ Request::is('admin/usuarios*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/usuarios*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Gestión de Usuarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.asignar.index') }}"
                                class="nav-link {{ Request::routeIs('admin.asignar.index') ? 'active' : '' }}">
                                <i class="fas fa-user-check"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="nav-link {{ Request::routeIs('admin.roles.index') ? 'active' : '' }}">
                                <i class="fas fa-user-cog"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permisos.index') }}"
                                class="nav-link {{ Request::routeIs('admin.permisos.index') ? 'active' : '' }}">
                                <i class="fas fa-user-lock"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Gestión de Documentos -->
                {{-- <li class="nav-item has-treeview {{ Request::is('admin/documentos*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/documentos*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder-open"></i>
                        <p>
                            Gestión Documentos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('admin.documentos.index') ? 'active' : '' }}">
                                <i class="fas fa-file-signature"></i>
                                <p>Documentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('') ? 'active' : '' }}">
                                <i class="fas fa-user-cog"></i>
                                <p>Tipo de documentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('') ? 'active' : '' }}">
                                <i class="fas fa-user-lock"></i>
                                <p>Archivos</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Inicio
                            <span class="right badge badge-danger">Principal</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
    $(document).ready(function() {
        // Función para abrir el menú padre cuando un submenú está activo
        function openActiveTreeview() {
            var activeLink = $('.nav-treeview .nav-link.active');
            if (activeLink.length > 0) {
                activeLink.parents('.has-treeview').addClass('menu-open');
                activeLink.parents('.has-treeview').children('a').addClass('active');
            }
        }

        // Llamar a la función al cargar la página
        openActiveTreeview();

        // Manejar el clic en los elementos del menú
        $('.nav-sidebar .has-treeview > a').on('click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass('menu-open');
        });

        // Asegurar que el menú se abra cuando se hace clic en un submenú
        $('.nav-treeview .nav-link').on('click', function() {
            $(this).parents('.has-treeview').addClass('menu-open');
        });
    });
</script>
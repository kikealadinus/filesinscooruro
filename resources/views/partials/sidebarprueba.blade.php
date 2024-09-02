<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">File</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->image && Storage::disk('public')->exists(Auth::user()->image))
                    <img src="{{ Storage::url(Auth::user()->image) }}" class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}'s image">
                @else
                    <img src="{{ Storage::url('usuario_imagen/user_default.png') }}" class="user-image img-circle elevation-2" alt="Default Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
        <!--Menús-->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Inicio
                            <span class="right badge badge-danger">Principal</span>
                        </p>
                    </a>
                </li>
        
                <!-- Periodos -->
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('admin.periodos.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-arrows-alt-h"></i>
                        <p>
                            Periodos
                            <span class="right badge badge-success">Gestionar</span>
                        </p>
                    </a>
                </li>
        
                {{-- @if(session()->has('selected_period')) --}}
                    <!-- Gestión de Usuarios -->
                    {{-- <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Gestión de Usuarios<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                
                                <a href="{{route('admin.asignar.index')}}" class="nav-link {{ Request::routeIs('admin.asignar.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Usuarios</p>
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}" class="nav-link {{ Request::routeIs('admin.roles.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.permisos.index')}}" class="nav-link {{ Request::routeIs('admin.permisos.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permisos</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Gestión de Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.asignar.index') }}" class="nav-link {{ Request::routeIs('admin.asignar.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::routeIs('admin.roles.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.permisos.index') }}" class="nav-link {{ Request::routeIs('admin.permisos.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permisos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
        
                    <!-- Gestión de Documentos -->
                    <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Gestión Documentos<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categorías Documentos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Documentos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Archivos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
        
                    <!-- Gestión de Correspondencia -->
                    <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>G. Correspondencias<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Correspondencia Entrante</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Correspondencia Saliente</p>
                                </a>
                            </li>
                        </ul>
                    </li>
        
                    <!-- Reportes -->
                    {{-- <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Reportes<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reportes de Documentos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reportes Correspondencia</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
        
                    <!-- Configuraciones -->
                    {{-- <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Configuraciones<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Configuración General</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Auditoría</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Seguridad</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
        
                    <!-- Tareas -->
                    {{-- <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Tareas<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tareas Pendientes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tareas Completadas</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
        
                    <!-- Soporte -->
                    {{-- <li class="nav-item has-treeview {{ Request::is('usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-life-ring"></i>
                            <p>Soporte<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Documentación</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('usuarios.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Centro de Ayuda</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                {{-- @endif --}}
            </ul>
        </nav>
        <!--Fin Menús-->
    </div>    
</aside>
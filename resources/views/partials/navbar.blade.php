<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.home')}}" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contacto</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="datetime-location-container">
            <span id="datetime"></span> - <span id="location"></span>
        </div>
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image && Storage::disk('public')->exists(Auth::user()->image))
                            <img src="{{ Storage::url(Auth::user()->image) }}" class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}'s image">
                        @else
                            <img src="{{ Storage::url('usuario_imagen/user_default.png') }}" class="user-image img-circle elevation-2" alt="Default Image">
                        @endif
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-black">
                            @if(Auth::user()->image && Storage::disk('public')->exists(Auth::user()->image))
                                <img src="{{ Storage::url(Auth::user()->image) }}" class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}'s image">
                            @else
                                <img src="{{ Storage::url('usuario_imagen/user_default.png') }}" class="user-image img-circle elevation-2" alt="Default Image">
                            @endif
                            <p>
                                {{ Auth::user()->name }} - 
                                @if(Auth::user()->getRoleNames()->isNotEmpty())
                                    {{ Auth::user()->getRoleNames()->first() }} <!-- Muestra el primer rol si el usuario tiene más de uno -->
                                @else
                                    Sin rol asignado
                                @endif
                                <small>Miembro desde: <b>{{ Auth::user()->created_at->format('d M. Y') }}</b></small>
                            </p>
                            
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a href="#"></a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#"></a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#"></a>
                                </div>
                            </div>
                        </li>
                        <li class="user-footer">
                            <a href="#" class="btn btn-primary btn-flat">Mi Perfil</a>
                            <a href="#" class="btn btn-danger btn-flat float-right"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </ul>
</nav>

<script>
    // Función para actualizar la hora y fecha en tiempo real
    function updateDateTime() {
        const datetimeElement = document.getElementById('datetime');
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        datetimeElement.textContent = now.toLocaleDateString('es-ES', options);
    }

    // Actualizar cada segundo
    setInterval(updateDateTime, 1000);
    updateDateTime(); // Llamada inicial para mostrar inmediatamente

    // Obtener la ubicación actual (país y ciudad) usando ipapi.co
    async function fetchLocation() {
        try {
            const response = await fetch('https://ipapi.co/json/');
            const data = await response.json();
            const locationElement = document.getElementById('location');
            locationElement.textContent = `${data.country_name} - ${data.city}`;
        } catch (error) {
            console.error('Error fetching location:', error);
            document.getElementById('location').textContent = 'Ubicación no disponible';
        }
    }

    fetchLocation(); // Llamar a la función para obtener la ubicación al cargar la página
</script>
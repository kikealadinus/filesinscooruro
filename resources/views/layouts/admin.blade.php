<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Archivos | INSCO-Oruro')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <style>
        .nav-link.active {
            background-color: #007bff; /* color azul */
            color: white;
        }

        .content-wrapper {
            margin-top: 56px; /* Ajusta este valor según la altura de tu nav */
            margin-bottom: 65px;
        }

        .status-indicator {
            display: inline-block;
            width: 10px; /* Tamaño del punto */
            height: 10px;
            background-color: #28a745; /* Color verde */
            border-radius: 50%; /* Hace que sea un círculo */
            margin-right: 5px; /* Espacio entre el punto y el texto */
            vertical-align: middle; /* Alineación vertical */
        }

        .status-text {
            font-size: 14px; /* Tamaño del texto */
            color: #28a745; /* Color del texto en línea */
            vertical-align: middle; /* Alineación vertical */
        }

        .datetime-location-container {
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: center; /* Centrado vertical */
            height: 100%; /* Asegura el centrado vertical completo */
            padding: 10px 20px; /* Espaciado interno para mejorar la apariencia */
            background-color: #0b0b0b; /* Fondo claro para un aspecto elegante */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra ligera para profundidad */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente moderna */
            font-size: 14px; /* Tamaño de letra ajustado */
            color: #f2f4f7; /* Color del texto */
            margin: 0 auto; /* Alinea el contenedor al centro */
        }

        .datetime-location-container span {
            margin: 0 5px; /* Espacio entre los textos */
        }

        .datetime-location-container #datetime {
            font-weight: 500; /* Negrita ligera para la hora y fecha */
        }

        .datetime-location-container #location {
            color: #28a745; /* Verde para resaltar la ubicación */
            font-weight: 600; /* Negrita para dar énfasis */
        }

    </style>
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake img-circle" src="{{asset('dist/img/inscologo.jpg')}}" alt="AdminLTELogo" height="60"
                width="60">
        </div>
        
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content_header')
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        
        @include('partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
    
    @yield('js')
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farmacia</title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/home.jpg" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- daterange picker -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}"> --}}
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"> --}}
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}"> --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="{{ asset('img/home.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Avellaneda Norte</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image">
                                    <p>
                                        &nbsp;{{ Empleado::empleado()->apellido }},
                                        {{ Empleado::empleado()->nombre }}
                                    </p>
                                    <i class="right fas fa-angle-left mt-1"></i>
                                </a>
                                <!-- submenu de usuario -->
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="far fa-circle nav-icon"></i>
                                            Cerrar Sesi&oacute;n
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul> <!-- fin de submenu de usuario -->
                            </li>
                        </ul>
                    </nav>
                    <!-- <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div> -->
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        @can('ventas_list')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-money-check-alt"></i>
                                    <p>
                                        Ventas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('ventas.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ventas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('compras_list')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Compras
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('proveedores.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Proveedores</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('compras.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ingreso</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan


                        @can('inventario_list')

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-warehouse"></i>
                                    <p>
                                        Almacenes
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sucursales</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-boxes"></i>
                                    <p>
                                        Inventario
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">


                                    <li class="nav-item">
                                        <a href="{{ route('productos.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Productos</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        @endcan

                        @can('inventario_list')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Cajas
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('cajas.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Flujo de Cajas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('inventario_list')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Empleados
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('empleados.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Empleados</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('inventario_list')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Liquidaciones
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('liquidacion.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liquidacion</p>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('conceptos.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Conceptos</p>
                                        </a>
                                    </li>
                                </ul>


                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('categorias.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categorias</p>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('configuracioncategoria.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Configuracion categorias</p>
                                        </a>
                                    </li>
                                </ul>


                            </li>
                        @endcan

                        @can('ajustes_list')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Ajustes
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('marcas.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Marcas</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('capacidades.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Capacidad</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('categorias.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categorias</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sub Categorias</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        @endcan

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- contenido -->
            @yield('content')

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Farmacia Avellaneda Norte</strong> - Salud y Atención de Calidad
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

    @stack('scripts');

    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script> --}}
    <!-- ChartJS -->
    {{-- <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script> --}}

    <!-- Select2 -->
    {{-- <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script> --}}
    <!-- Bootstrap4 Duallistbox -->
    {{-- <script src="{{ asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script> --}}
    <!-- InputMask -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    {{-- <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
    <!-- bootstrap color picker -->
    {{-- <script src="{{ asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


</body>

</html>

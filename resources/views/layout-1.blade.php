<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Bootstrap -->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>

    {{--  Livewire --}}
    <livewire:styles/>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand --navbar-gradient">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars text-white"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <button class="btn" type="button">
                    <i class="fa-solid fa-arrows-rotate text-white"></i>
                </button>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img class="rounded-circle" src="/storage/{{ auth()->user()->image }}" alt="admin profile pic"
                         width="25">
                    <span class="ml-2 text-white">{{ auth()->user()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="d-flex flex-column justify-content-center align-items-center pt-3 pb-3 --bg-second">
                        <img class="rounded-circle" src="/dist/img/user2-160x160.jpg" alt="admin profile pic"
                             width="70">
                        <div class="mt-3 text-white">
                            <p class="text-center">{{ auth()->user()->username }}</p>
                            <p class="text-center --fs-12">Member since admin 2023-11-06 23:59:04</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between p-3">
                        <a class="btn btn-sm border border-3 btn-light" href="{{ route('profile.edit') }}">Setting</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn btn-sm border border-3 btn-light" href="">Log Out</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar --sidebar-white elevation-4">
        <!-- Brand Logo -->
        <div class="--sidebar-title">
            <a href="/admin" class="brand-link">
                {{-- <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8"> --}}
                <span class="text-white font-weight-bold ">管理员</span>
                <span class="text-white brand-text">后台</span>
            </a>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(auth()->user()->image)
                        <img src="/storage/{{ auth()->user()->image }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="#" class="d-block text-dark">{{ auth()->user()->username }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
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
                    <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                    @can('fry-management')
                        <li class="nav-item">
                            <a href="/admin/fry" class="nav-link">
                                <i class="fa-solid fa-truck-medical mr-2"></i>
                                <p>
                                    鱼苗管理
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('dashboard')
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <i class="fa-solid fa-chart-column mr-2"></i>
                                <p>
                                    仪表盘
                                </p>
                            </a>
                        </li>
                    @endcan
                    @canany(['user-management', 'role-management'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-server mr-2"></i>
                                <p class="text-dark">
                                    行政管理
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('user-management')
                                    <li class="nav-item">
                                        <a href="/admin/auth/users" class="nav-link">
                                            <i class="fa-solid fa-users mr-2"></i>
                                            <p>用户管理</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('role-management')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link">
                                            <i class="fa-solid fa-user mr-2"></i>
                                            <p>角色管理</p>
                                        </a>
                                    </li>
                                @endcan
                                {{--                                    @can('menu-management')--}}
                                {{--                                        <li class="nav-item">--}}
                                {{--                                            <a href="{{ route('menus.index') }}" class="nav-link">--}}
                                {{--                                                <i class="fa-solid fa-bars mr-2"></i>--}}
                                {{--                                                <p>Menu Management</p>--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                    @endcan--}}
                                {{-- <li class="nav-item">
                                <a href="/admin/auth/permissions" class="nav-link">
                                    <i class="fa-solid fa-ban mr-2"></i>
                                    <p>Permission Management</p>
                                </a>
                            </li> --}}
                                {{-- @can('menu-management')
                                <li class="nav-item">
                                    <a href="/admin/auth/menu" class="nav-link">
                                        <i class="fa-solid fa-bars mr-2"></i>
                                        <p>Menu Management</p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa-solid fa-clock-rotate-left mr-2"></i>
                                    <p>Operation Log</p>
                                </a>
                            </li> --}}
                            </ul>
                        </li>
                    @endcanany
                    @canany(['autoresponder-management'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-hands-asl-interpreting mr-2"></i>
                                <p class="text-dark">
                                    客户管理
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('autoresponder-management')
                                    <li class="nav-item">
                                        <a href="{{ route('autoresponders.index') }}" class="nav-link">
                                            <i class="fa-solid fa-bars mr-2"></i>
                                            <p>自动回复模板</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('customer-service-management')
                                    <li class="nav-item">
                                        <a href="{{ route('customer-service.index') }}" class="nav-link">
                                            <i class="fa-solid fa-bars mr-2"></i>
                                            <p>客户服务列表</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content-header')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    {{-- <footer class="main-footer"> --}}
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
  Anything you want
</div> --}}
    <!-- Default to the left -->
    {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
reserved. --}}
    {{--
</footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

{{-- Livewire --}}
<livewire:scripts/>

<!-- Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if (token) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if (session('create'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('create') }} created successfully!'
        })
        @endif
        @if (session('update'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('update') }} updated successfully!"
        })
        @endif
        @if (session('delete'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('delete') }} deleted successfully!"
        })
        @endif

    });
</script>

@yield('scripts')

</body>

</html>

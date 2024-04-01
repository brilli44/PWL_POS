{{-- Jobsheet 7 praktikum 1 bagian 7 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Jobsheet 7 praktikum 1 baagian 9 -->
    <title>{{ config('app.name', 'PWL Laravel Strater Code') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        {{-- Jobsheet 7 praktikum 1 bagian 10 --}}
        {{-- Navbar --}}
        @include('layouts.header')
        {{-- .Navbar --}}

         {{-- Jobsheet 7 praktikum 1 bagian 11 --}}
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('/')}}" class="brand-link">
                <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PWL - Starter Code</span>
            </a>

            {{-- Jobsheet 7 praktikum 1 bagian 12 --}}
            {{-- Sidebar --}}
            @include('layouts.sidebar')
            {{-- .Sidebar --}}
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            {{-- Jobsheet 7 praktikum 1 bagian 16 --}}
            {{-- Breadcrumb --}}
            @include('layouts.breadcrumb')
            {{-- .Breadcrumb --}}

            <!-- Main content -->
            <section class="content">
                {{-- Jobsheet 7 praktikum 1 bagian 18 --}}
                {{-- Content --}}
                @yield('content')
                {{-- .Content --}}
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- Jobsheet 7 praktikum 1 bagian 13 --}}
        {{-- Footer --}}
        @include('layouts.footer')
        {{-- .Footer --}}
    </div>
    <!-- ./wrapper -->

    <!-- Jobsheet 7 praktikum 1 bagian 14 -->
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
</body>

</html>
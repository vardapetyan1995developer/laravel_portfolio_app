<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/toastr/css/toastr.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    @include('layouts.dashboard.partial.sidebars.index')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            @include('layouts.dashboard.partial.navbars.index')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                @if(request()->route()->getName() === 'dashboard')
                    <x-custom.heading>Dashboard</x-custom.heading>
                @endif
            </div>
            <!-- /.container-fluid -->

            {{ $slot }}
        </div>
        <!-- End of Main Content -->

        @include('layouts.dashboard.partial.footer.index')
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<x-custom.scroll-to-top-button></x-custom.scroll-to-top-button>

<!-- Logout Modal-->
@include('layouts.dashboard.partial.modals.logout-modal')

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lib/axios/axios.min.js') }}"></script>
<script src="{{ asset('lib/toastr/js/toastr.min.js') }}"></script>
@stack('dashboard-scripts')

@if(session('success'))
    <script>
        toastr.info('{{ session('success') }}');
    </script>
@elseif(session('fail'))
    <script>
        toastr.error('{{ session('fail') }}');
    </script>
@endif
</body>
</html>

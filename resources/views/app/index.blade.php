<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends("app.header")

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Navbar -->
    @include('app.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @extends('app.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5">@yield('content')</div>
    <!-- /.content-wrapper -->
    @extends('app.footer')
</div>
<!-- ./wrapper -->
</body>

</html>

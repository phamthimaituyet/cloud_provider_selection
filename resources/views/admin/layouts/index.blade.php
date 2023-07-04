<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @include('admin.layouts.head_index')
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="zoom: 90%;">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
            $page = '';
            if (isset($user)) {
                $page = 'users.index';
            } else if (isset($product)) {
                $page = 'products.index';
            } else if (isset($category)) {
                $page = 'categories.index';
            } else if (isset($criteria)) {
                $page = 'criterias.index';
            } else if (isset($vendor)) {
                $page = 'vendors.index';
            } else if (isset($dashboard)) {
                $page = 'dashboard';
            }
        ?>
            @include('admin.include.head', [
                'page' => $page ?? '',
            ])
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
            @include('admin.include.sidebar', [
                'dashboard' => $dashboard ?? '',
                'user' => $user ?? '',
                'category' => $category ?? '',
                'product' => $product ?? '',
                'criteria' => $criteria ?? '',
                'vendor' => $vendor ?? ''
            ])
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            {{-- Alert --}}
            @include('admin.layouts.alert')
            
            <!-- Content Header (Page header) -->
                @yield('content_header')
            <!-- /.content-header -->

            <!-- Main content -->
                @yield('content')
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

   @include('admin.layouts.link_script')
    @yield('script')
</body>
</html>


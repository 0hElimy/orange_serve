<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>悦桔拉拉后台管理系统</title>
    <!-- Global stylesheets -->
    <link href="/vendor/limitui/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="/css/common.css">

    @yield('css')
</head>

<body>

<!-- Main navbar -->
@include('layouts.admin.shared._navbar')
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
    @include('layouts.admin.shared._sidebar')
    <!-- /main sidebar -->

        <!-- Main content -->
        @yield('content')
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->

{{--<script type="text/javascript" src="/js/jquery.min.js"></script>--}}

<!-- Core JS files -->
<script type="text/javascript" src="/vendor/limitui/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="/vendor/limitui/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/plugins/pickers/daterangepicker.js"></script>

<script type="text/javascript" src="/vendor/limitui/js/core/app.js"></script>
<script type="text/javascript" src="/vendor/limitui/js/pages/components_modals.js"></script>
<!-- /theme JS files -->

<script src="/js/destroy.js"></script>
<script src="/js/common.js"></script>
<script src="/js/admin/common.js"></script>

@yield('js')
</body>
</html>

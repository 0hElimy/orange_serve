@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">清除缓存</a></li>
                    <li class="active">Clear Cache</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->

    @include('layouts.admin.shared._flash')

        <!-- Content area -->
        <div class="content">
            <div class="alert text-violet-800 alpha-violet no-border">
                <span class="text-semibold"><a href="{{route('admin.config.cache_destroy')}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="确定要清除么?" class="alert-link">点我清除缓存!</a></span>
            </div>
            <!-- Footer -->
            @include('layouts.admin.shared._footer')
            <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>
@endsection
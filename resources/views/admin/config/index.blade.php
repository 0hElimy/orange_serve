@extends('layouts.admin.app')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <!-- Header content -->
            <div class="page-header-content">
                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                        <li><a href="javascript:;">个人信息</a></li>
                        <li class="active">Profile Information</li>
                    </ul>
                </div>
                <!-- /header content -->
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="tabbable">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="activity">
                                    <!-- Timeline -->
                                    <div class="timeline timeline-left content-group">
                                        <div class="timeline-container">
                                            <!-- Date stamp -->
                                            <div class="timeline-date text-muted">
                                                <i class="icon-history position-left"></i>
                                                <span class="text-semibold">{{date("l")}}</span>, {{date("F")}} {{date("d")}}
                                            </div>
                                            <!-- /date stamp -->
                                            <!-- Invoices -->
                                            <div class="timeline-row">
                                                <div class="timeline-icon">
                                                    <div class="bg-warning-400">
                                                        <i class="icon-location3"></i>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="panel border-left-lg border-left-success invoice-grid timeline-content">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <h6 class="text-semibold no-margin-top">
                                                                            登录日志</h6>
                                                                        <ul class="list list-unstyled">
                                                                            <li>登录时间 : &nbsp;2018-12-31 19:21:10</li>
                                                                            <li>登录IP : <span class="text-semibold">27.17.206.95</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-row">
                                                <div class="timeline-icon">
                                                    <div class="bg-warning-400">
                                                        <i class="icon-location3"></i>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="panel border-left-lg border-left-success invoice-grid timeline-content">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <h6 class="text-semibold no-margin-top">
                                                                            登录日志</h6>
                                                                        <ul class="list list-unstyled">
                                                                            <li>登录时间 : &nbsp;2018-12-31 19:21:10</li>
                                                                            <li>登录IP : <span class="text-semibold">27.17.206.95</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /invoices -->
                                        </div>
                                    </div>
                                    <!-- /timeline -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb thumb-rounded thumb-slide">
                                @if(auth('admin')->user()->image == "")
                                    <img src="/vendor/limitui/images/placeholder.jpg">
                                @else
                                    <img src="{{auth('admin')->user()->image}}" style="height: 100px">
                                @endif
                                <div class="caption">
                                    <span>
                                        <a class="btn bg-success-400 btn-icon btn-xs upload_img" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                    </span>
                                </div>
                            </div>

                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin">{{auth('admin')->user()->name}}
                                    <small class="display-block">Holy Designer</small>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
            @include('layouts.admin.shared._footer')
            <!-- /footer -->
            </div>
            <!-- /content area -->
        </div>
    </div>
@endsection


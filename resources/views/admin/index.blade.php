@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="/admin"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li class="active">Home</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <!-- Dashboard content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Members online -->
                            <div class="panel bg-teal-400">
                                <div class="panel-body order_in">
                                    <h3 class="no-margin">订单统计信息</h3>
                                    <hr>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">今日待发货订单 : 50</a>
                                    </div>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">今日已发货订单 : 100</a>
                                    </div>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">今日已成交订单 : 230</a>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                            <!-- /members online -->
                        </div>

                        <div class="col-lg-4">
                            <!-- Current server load -->
                            <div class="panel bg-pink-400">
                                <div class="panel-body order_in">
                                    <h3 class="no-margin">最新留言</h3>
                                    <hr>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">今日未回复留言 : 50</a>
                                    </div>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">今日已回复留言 : 100</a>
                                    </div>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">今日未审核评论: : 230</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /current server load -->
                        </div>

                        <div class="col-lg-4">
                            <!-- Today's revenue -->
                            <div class="panel bg-blue-400">
                                <div class="panel-body order_in">
                                    <h3 class="no-margin">实体商品统计信息</h3>
                                    <hr>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">商品总数 : 50</a>
                                    </div>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">库存警告商品数 : 100</a>
                                    </div>
                                    <div class="text-muted text-size-small">
                                        <a href="" style="color: #fff">促销商品数 : 230</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /today's revenue -->
                        </div>
                    </div>
                    <!-- /quick stats boxes -->

                    <!-- Support tickets -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">系统信息</h6>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-xlg text-nowrap">
                                <tbody>
                                <tr>
                                    <td class="col-md-4">
                                        <div class="media-left media-middle">
                                            <div id="tickets-status"></div>
                                        </div>
                                        <div class="media-left">
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> 服务器操作系统:	Darwin (::1)</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> MySQL 版本:	5.7.19</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> Socket 支持:	是</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> Web 服务器:	Apache</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> 时区设置:	Asia/Shanghai</span><br>
                                        </div>
                                    </td>

                                    <td class="col-md-3">
                                        <div class="media-left">
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> Web 服务器:	Apache</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> PHP 版本:	7.2.1</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> GD 版本:	GD2 ( JPEG GIF PNG)</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> 文件上传的最大大小: 32M</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> 编码:	UTF-8</span><br>
                                        </div>
                                    </td>

                                    <td class="col-md-3">
                                        <div class="media-left">
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> 开发日期:	2019-01-04</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> Socket 支持:	是</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> Web 服务器:	Apache</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> 时区设置:	Asia/Shanghai</span><br>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> IP 库版本:	20190104</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th style="width: 50px">时间</th>
                                    <th style="width: 300px;">模块</th>
                                    <th>技术描述</th>
                                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">2
                                            <small class="display-block text-size-small no-margin">hours</small>
                                        </h6>
                                    </td>
                                    <td>商品品牌</td>
                                    <td>普通开发</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">2
                                            <small class="display-block text-size-small no-margin">hours</small>
                                        </h6>
                                    </td>
                                    <td>商品分类</td>
                                    <td>普通开发</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">5
                                            <small class="display-block text-size-small no-margin">hours</small>
                                        </h6>
                                    </td>
                                    <td>商品管理</td>
                                    <td>普通开发</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /support tickets -->
                </div>
            </div>
            <!-- /dashboard content -->
            <!-- Footer -->
        @include('layouts.admin.shared._footer')
        <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>
@endsection

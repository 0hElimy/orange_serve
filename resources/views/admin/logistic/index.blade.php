@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">物流运费</a></li>
                    <li class="active">Logistic Manage</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->

    @include('layouts.admin.shared._flash')

    <!-- Content area -->
        <div class="content">
            <!-- Table with togglable columns -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('admin.logistics.create')}}" class="btn btn-success btn-labeled btn-xs"><b><i class="icon-plus2"></i></b>新增</a>
                    <a href="javascript:;" class="btn btn-danger btn-labeled btn-xs del_all" data-controller="logistics"><b><i class="icon-trash"></i></b>删除</a>
                </div>

                <table class="table table-togglable table-hover">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox" id="check_all"/></th>
                        <th>#</th>
                        <th data-hide="phone">物流名称</th>
                        <th data-hide="phone">运费 / 满额包邮</th>
                        <th data-hide="phone">配送方式描述</th>
                        <th data-hide="phone">是否可用</th>
                        <th data-hide="phone">排序</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($logistics as $logistic)
                        <tr data-id="{{$logistic->id}}" data-attr="logistics">
                            <td><input type="checkbox" class="checked_id" name="checked_id[]"
                                       value="{{$logistic->id}}"/>
                            </td>
                            <td>{{$logistic->id}}</td>
                            <td><a href="javascript:;">{{$logistic->name}}</a></td>
                            <td>
                                <a href="javascript:;"><span class="label label-info">{{$logistic->shipping_money}} / {{$logistic->shipping_free}}</span></a>
                            </td>
                            <td>{{$logistic->desc}}</td>
                            <td>{!! is_something($logistic, 'is_enable') !!}</td>
                            <td>{{$logistic->sort}}</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="{{route('admin.logistics.edit', $logistic->id)}}"><i class="icon-pencil"></i>
                                                    编辑</a></li>
                                            <li>
                                                <a href="{{route('admin.logistics.destroy', $logistic->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="确定要删除么?"><i class="icon-trash"></i>
                                                    删除</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div style="margin: 30px 0 10px 10px;">
                    <p>共 {{$logistics->total()}} 条记录</p>

                    <div class="text-right" style="margin:0 10px 10px 0">
                        {!! $logistics->appends(Request::all())->links() !!}
                    </div>
                </div>

            </div>
            <!-- /table with togglable columns -->

            <!-- Footer -->
        @include('layouts.admin.shared._footer')
        <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>
@endsection
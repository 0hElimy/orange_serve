@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">广告分类</a></li>
                    <li class="active">Advert Category</li>
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
                    <a data-toggle="modal" data-target="#add_cate" class="btn btn-success btn-labeled btn-xs"><b><i class="icon-plus2"></i></b>新增</a>
                </div>

                <table class="table table-togglable table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th data-hide="phone">分类名称</th>
                        <th data-hide="phone">排序</th>
                        <th data-hide="phone">创建日期</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($advertCategories as $category)
                        <tr data-id="{{$category->id}}">
                            <td>{{$category->id}}</td>
                            <td class="name">{{$category->name}}</td>
                            <td class="sort">{{$category->sort}}</td>
                            <td><span class="label label-success">{{$category->created_at}}</span></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a data-toggle="modal" data-target="#edit_cate" class="edit"><i class="icon-pencil"></i>编辑</a></li>
                                            <li><a href="javascript:;" class="del_one"><i class="icon-trash"></i>删除</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /table with togglable columns -->

            <!-- Footer -->
        @include('layouts.admin.shared._footer')
        <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>

    <!--新增模态框-->
    <div id="add_cate" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">新增分类</h5>
                </div>

                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-lg-2">分类名称</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="请输入名称" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">排序：</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sort" placeholder="请输入0~99排序值">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">关 闭</button>
                        <button type="button" class="btn btn-primary submit">提 交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--编辑模态框-->
    <div id="edit_cate" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">编辑分类</h5>
                </div>

                <form class="form-horizontal">
                    <input type="hidden" id="edit_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-lg-2">分类名称</label>
                            <div class="col-sm-9">
                                <input type="text" id="edit_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">排序：</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_sort">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">关 闭</button>
                        <button type="button" class="btn btn-primary save_cate">保 存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/admin/advertCategory.js"></script>
@endsection
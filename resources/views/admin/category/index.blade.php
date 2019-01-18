@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">分类管理</a></li>
                    <li class="active">Category Manage</li>
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
                    <a href="{{route('admin.categories.create')}}" class="btn btn-success btn-labeled btn-xs"><b><i class="icon-plus2"></i></b>新增</a>
                    <a href="javascript:;" class="btn btn-danger btn-labeled btn-xs" id="show_all"><b><i class="icon-enlarge7"></i></b>展开</a>
                </div>

                <table class="table table-togglable table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th data-hide="phone">分类名称</th>
                        <th data-hide="phone">所有品牌</th>
                        <th data-hide="phone">是否显示</th>
                        <th data-hide="phone">排序</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr data-id="{{$category->id}}" class="xParent" data-attr="categories">
                            <td>{{$category->id}}</td>
                            <td><a href="javascript:;">{{$category->name}}</a></td>
                            <td>{!! show_category_brands($category) !!}</td>
                            <td>{!! is_something($category, 'is_show') !!}</td>
                            <td>
                                <input type="text" name="sort" value="{{$category->sort}}" style="width: 50px">
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="{{route('admin.categories.edit', $category->id)}}"><i class="icon-pencil"></i>
                                                    编辑
                                                </a>
                                            </li>
                                            <li><a href="javascript:;" class="del_one"><i class="icon-trash"></i>删除</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>

                        @foreach($category->children as $child)
                            <tr data-id="{{$child->id}}" class="xChildren" data-attr="categories">
                                <td>{{$child->id}}</td>
                                <td>
                                    <a href="javascript:;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--{{$child->name}}</a>
                                </td>
                                <td></td>
                                <td>{!! is_something($child, 'is_show') !!}</td>
                                <td>
                                    <input type="text" name="sort" value="{{$child->sort}}" style="width: 50px">
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="{{route('admin.categories.edit', $child->id)}}"><i class="icon-pencil"></i>
                                                        编辑
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" class="del_one"><i class="icon-trash"></i>删除</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
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
@endsection
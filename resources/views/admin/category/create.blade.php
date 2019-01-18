@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.categories.index')}}"><i class="icon-home2 position-left"></i> 首页</a>
                    </li>
                    <li><a href="javascript:;">新增分类</a></li>
                    <li class="active">Create A New Category</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">

        @include('layouts.admin.shared._flash')

        <!-- Form horizontal -->
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('admin.categories.store')}}" method="post">
                        @csrf
                        <fieldset class="content-group">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">上级分类:</label>
                                <div class="col-lg-10">
                                    <select class="select" name="parent_id">
                                        <option value="0">顶级分类</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">分类名称：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" placeholder="请输入名称" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">是否显示：</label>
                                <div class="col-lg-10">
                                    <label class="radio-inline"><input type="radio" name="is_show" checked="checked" value="1">是</label>
                                    <label class="radio-inline"><input type="radio" name="is_show" value="0">否</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">排序：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="sort" placeholder="请输入0~99排序值" value="{{old('sort')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">描述：</label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="desc" class="form-control" placeholder="简单描述一下吧..."></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">保 存
                                <i class="icon-arrow-right14 position-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /form horizontal -->

            <!-- Footer -->
        @include('layouts.admin.shared._footer')
        <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>
@endsection

@section('js')
    {{--select框--}}
    <script type="text/javascript" src="/vendor/limitui/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/vendor/limitui/js/pages/form_layouts.js"></script>
@endsection
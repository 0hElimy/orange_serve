@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.categories.index')}}"><i class="icon-home2 position-left"></i> 首页</a>
                    </li>
                    <li><a href="javascript:;">编辑分类</a></li>
                    <li class="active">Update A Category</li>
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
                    <form class="form-horizontal" action="{{route('admin.categories.update', $cate->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset class="content-group">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">上级分类:</label>
                                <div class="col-lg-10">
                                    <select class="select" name="parent_id">
                                        @if($cate->parent_id == 0)
                                            <option value="0">顶级分类</option>
                                        @else
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($cate->parent_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">分类名称：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" value="{{$cate->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">是否显示：</label>
                                <div class="col-lg-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="is_show" value="1" @if($cate->is_show == 1) checked @endif>是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="is_show" value="0" @if($cate->is_show == 0) checked @endif>否
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">排序：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="sort" value="{{$cate->sort}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">描述：</label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="desc" class="form-control">{{$cate->desc}}</textarea>
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
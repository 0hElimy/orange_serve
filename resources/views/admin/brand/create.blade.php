@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.brands.index')}}"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">新增品牌</a></li>
                    <li class="active">Create A New Brand</li>
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
                    <form class="form-horizontal" action="{{route('admin.brands.store')}}" method="post">
                        @csrf
                        <fieldset class="content-group">
                            <div class="form-group">
                                <label class="control-label col-lg-2">品牌名称：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" placeholder="请输入名称" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">所属分类:</label>
                                <div class="col-lg-10">
                                    <select class="select bg-teal-400" name="category_id">
                                        <option>请选择</option>

                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
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
                        </fieldset>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                保 存
                                <i class="icon-arrow-right14 position-right"></i></button>
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
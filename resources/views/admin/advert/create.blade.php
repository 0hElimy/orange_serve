@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.adverts.index')}}"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">新增广告</a></li>
                    <li class="active">Create A New Advert</li>
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
                    <form class="form-horizontal" action="{{route('admin.adverts.store')}}" method="post">
                        @csrf
                        <fieldset class="content-group">
                            <div class="form-group">
                                <label class="control-label col-lg-2">广告标题：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="title" placeholder="请输入标题" value="{{old('title')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">所属分类：</label>
                                <div class="col-lg-10">
                                    <select name="category_id" class="form-control">
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
                                <label class="control-label col-lg-2">商品缩略图：</label>

                                <div class="col-lg-10">
                                    <div class="am-form-group am-form-file new_thumb">
                                        <button type="button" class="btn btn-success upload_img">
                                            <i class="icon-cloud-upload" id="loading"></i> 上传商品图片
                                        </button>
                                        <input type="file" id="image_upload" style="display: none;">
                                        <input type="hidden" name="image">
                                    </div>
                                    <hr style="border-top:1px dashed #ddd;">
                                    <div>
                                        <img src="" id="img_show">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">广告地址：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="url" placeholder="请输入广告地址" value="{{old('url')}}">
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
                            <button type="submit" class="btn btn-primary">保 存
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
    <script src="/vendor/html5-fileupload/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>
@endsection
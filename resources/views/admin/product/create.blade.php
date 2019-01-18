@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css"/>
    <link rel="stylesheet" href="/vendor/webupload/dist/webuploader.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/webupload/style.css"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.products.index')}}"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">新增商品</a></li>
                    <li class="active">Create A New Product</li>
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
                    <form class="form-horizontal" action="{{route('admin.products.store')}}" method="post">
                        @csrf
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                                <li class="active">
                                    <a href="#products_tab1" data-toggle="tab" aria-expanded="true">通用</a>
                                </li>
                                <li class="">
                                    <a href="#products_tab2" data-toggle="tab" aria-expanded="false">详情</a>
                                </li>

                                <li class="">
                                    <a href="#products_tab3" data-toggle="tab" aria-expanded="false">属性</a>
                                </li>

                                <li class="">
                                    <a href="#products_tab4" data-toggle="tab" aria-expanded="false">相册</a>
                                </li>

                                <li class="">
                                    <a href="#products_tab5" data-toggle="tab" aria-expanded="false">参数</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="products_tab1">
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">商品名称：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="pro_name" placeholder="请输入名称" value="{{old('pro_name')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">所属分类：</label>
                                            <div class="col-lg-10">
                                                <select multiple name="category_id[]" class="select" data-placeholder="请选择分类">
                                                    <option>请选择</option>
                                                    @foreach($categories as $category)
                                                        <optgroup label="{{$category->name}}">

                                                            @foreach($category->children as $child)
                                                                <option value="{{$child->id}}">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;|--{{$child->name}}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
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
                                                    <img src="" id="img_show" style="max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">所属品牌:</label>
                                            <div class="col-lg-10">
                                                <select class="select bg-teal-400" name="brand_id">
                                                    <option>请选择</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">单价：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="price" placeholder="请输入单价" value="{{old('price')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">库存：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="stock" placeholder="请输入库存" value="{{old('stock')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">是否上架：</label>
                                            <div class="col-lg-10">
                                                <label class="radio-inline"><input type="radio" name="is_onsale" checked="checked" value="1">是</label>
                                                <label class="radio-inline"><input type="radio" name="is_onsale" value="0">否</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">排序：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="sort" placeholder="请输入0~99排序值" value="99">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">描述：</label>
                                            <div class="col-lg-10">
                                                <textarea rows="5" cols="5" name="desc" class="form-control" placeholder="商品简单描述"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="tab-pane" id="products_tab2">
                                    <div class="form-group">
                                        <div id="markdown">
                                            <textarea rows="10" name="content" style="display:none;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="products_tab3">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"></label>
                                        <div class="col-lg-10">
                                            <span>属性：</span>
                                            <button type="button" class="btn btn-info btn-xs" id="add_file">
                                                <i class="icon-plus2"></i>增加
                                            </button>
                                        </div>
                                    </div>

                                    <div id="files">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2"></label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control file1" name="name[]" placeholder="属性名" value="{{old('name')}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control file1" name="value[]" placeholder="属性值" value="{{old('value')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <a href="javascript:;" class="empty_file1" style="color: red;"><i class="icon-cross3"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="products_tab4">
                                    <div id="uploader">
                                        <div class="queueList">
                                            <div id="dndArea" class="placeholder">
                                                <div id="filePicker"></div>
                                                <p>或将照片拖到这里，单次最多可选300张</p>
                                            </div>
                                        </div>
                                        <div class="statusBar" style="display:none;">
                                            <div class="progress">
                                                <span class="text">0%</span>
                                                <span class="percentage"></span>
                                            </div>
                                            <div class="info"></div>
                                            <div class="btns">
                                                <div id="filePicker2"></div>
                                                <div class="uploadBtn">开始上传</div>
                                            </div>
                                        </div>

                                        <div id="imgs"></div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="products_tab5">
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">原料产地：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="origin_area" placeholder="请输入原料产地" value="{{old('origin_area')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">真实产地：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="product_area" placeholder="请输入真实产地" value="{{old('product_area')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">配料：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="burden_sheet" placeholder="请输入配料" value="{{old('burden_sheet')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">规格：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="standard" placeholder="请输入规格" value="{{old('standard')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">保质期：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="expiration_date" placeholder="请输入保质期" value="{{old('expiration_date')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">产品标准号：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="standard_code" placeholder="请输入产品标准号" value="{{old('standard_code')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">生产许可证编号：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="product_certificate" placeholder="请输入生产许可证编号" value="{{old('product_certificate')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">储存方法：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="stockpile" placeholder="请输入储存方法" value="{{old('stockpile')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">食用方法：</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="edible_methods" placeholder="请输入食用方法" value="{{old('edible_methods')}}">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

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
    <script src="/vendor/markdown/editormd.min.js"></script>
    <script src="/js/editormd_config.js"></script>
    <script type="text/javascript" src="/vendor/webupload/dist/webuploader.js"></script>
    <script type="text/javascript" src="/vendor/webupload/upload.js"></script>

    {{--select框--}}
    <script type="text/javascript" src="/vendor/limitui/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/vendor/limitui/js/pages/form_layouts.js"></script>

    <script src="/js/admin/product.js"></script>
@endsection
@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.logistics.index')}}"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">新增物流</a></li>
                    <li class="active">Create A New Logistic</li>
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
                    <form class="form-horizontal" action="{{route('admin.logistics.store')}}" method="post">
                        @csrf
                        <fieldset class="content-group">
                            <div class="form-group">
                                <label class="control-label col-lg-2">快递名称：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" placeholder="请输入名称" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">快递公司代码：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="code" placeholder="请输入公司代码" value="{{old('code')}}">
                                    <span class="help-block"><a href="http://www.kuaidi100.com/download/api_kuaidi100_com(20140729).doc">查看代码</a></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">网址：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="url" placeholder="请输入网址" value="{{old('url')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">运费：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="shipping_money" placeholder="请输入运费" value="{{old('shipping_money')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">满额包邮：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="shipping_free" placeholder="满额包邮" value="{{old('shipping_free')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">配送方式描述：</label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="desc" class="form-control" placeholder="简单描述一下吧..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">是否可用：</label>
                                <div class="col-lg-10">
                                    <label class="radio-inline"><input type="radio" name="is_enable" checked="checked" value="1">是</label>
                                    <label class="radio-inline"><input type="radio" name="is_enable" value="0">否</label>
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

@endsection
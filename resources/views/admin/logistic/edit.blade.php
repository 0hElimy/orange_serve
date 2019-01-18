@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.logistics.index')}}"><i class="icon-home2 position-left"></i> 首页</a>
                    </li>
                    <li><a href="javascript:;">编辑物流</a></li>
                    <li class="active">Update A New Logistic</li>
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
                    <form class="form-horizontal" action="{{route('admin.logistics.update', $logistic->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset class="content-group">
                            <div class="form-group">
                                <label class="control-label col-lg-2">快递名称：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" value="{{$logistic->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">快递公司代码：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="code" value="{{$logistic->code}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">网址：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="url" value="{{$logistic->url}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">运费：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="shipping_money" value="{{$logistic->shipping_money}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">满额包邮：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="shipping_free" value="{{$logistic->shipping_free}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">配送方式描述：</label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="desc" class="form-control">{{$logistic->desc}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">是否可用：</label>
                                <div class="col-lg-10">
                                    <label class="radio-inline"><input type="radio" name="is_enable" value="1" @if($logistic->is_enable == 1) checked @endif>是</label>
                                    <label class="radio-inline"><input type="radio" name="is_enable" value="0" @if($logistic->is_enable == 0) checked @endif>否</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">排序：</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="sort" value="{{$logistic->sort}}">
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
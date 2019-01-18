@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">修改密码</a></li>
                    <li class="active">Change Password</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->

    @include('layouts.admin.shared._flash')

    <!-- Content area -->
        <div class="content">
            <form class="form-horizontal" action="{{route('admin.config.update_password')}}" method="post">
                @csrf
                @method('PUT')
                <fieldset class="content-group">
                    <legend class="text-bold">请填写以下信息：</legend>

                    <div class="form-group has-warning">
                        <label class="control-label col-lg-2 text-semibold">用户名：</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" disabled value="{{auth('admin')->user()->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-error">
                        <label class="control-label col-lg-2 text-semibold">原始密码：：</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="请输入原始密码" name="oldpassword">
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-lg-2 text-semibold">新密码：</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-lock2"></i></span>
                                <input type="password" class="form-control" placeholder="请输入新密码" name="password" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-lg-2 text-semibold">确认新密码：</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-lock2"></i></span>
                                <input type="password" class="form-control" placeholder="请再次输入新密码" name="newpassword">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">保 存
                        <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
            <!-- Footer -->
        @include('layouts.admin.shared._footer')
        <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>
@endsection



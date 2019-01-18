<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>悦桔拉拉后台登录</title>

    <!-- Global stylesheets -->
    <link href="/vendor/limitui/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/limitui/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/vendor/limitui/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="/vendor/limitui/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/limitui/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendor/limitui/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="/vendor/limitui/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>
<!-- Page container -->
<div class="page-container login-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">

                <!-- Simple login form -->
                <form action="{{ route('admin.login') }}" method="post">

                    @csrf

                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">悦桔拉拉后台登录
                                <small class="display-block">请输入用户名密码登录</small>
                            </h5>
                        </div>

                        @include('layouts.admin.shared._flash')

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="name" placeholder="请输入用户名/手机号/邮箱">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" name="password" placeholder="请输入密码">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="captcha" placeholder="请输入验证码">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <div style="margin-top: 10px;">
                                <img src="{{ captcha_src() }}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}&'+Math.random()" class="layadmin-user-login-codeimg">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">登 录
                                <i class="icon-circle-right2 position-right"></i></button>
                        </div>

                        <div class="text-center">
                            <a href="login_password_recover.html">忘记密码</a>
                        </div>
                    </div>
                </form>
                <!-- /simple login form -->

                <!-- Footer -->
                @include('layouts.admin.shared._footer')
                <!-- /footer -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>

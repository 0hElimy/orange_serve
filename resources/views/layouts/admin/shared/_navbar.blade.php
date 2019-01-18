<div class="navbar navbar-inverse bg-info-700">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="/vendor/limitui/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">Messages</span>
                    <span class="badge bg-warning-400">2</span>
                </a>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    @if(auth('admin')->user()->image == "")
                        <img src="/vendor/limitui/images/placeholder.jpg">
                    @else
                        <img src="{{auth('admin')->user()->image}}">
                    @endif
                    <span> {{auth('admin')->user()->name}} </span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{route('admin.config.change_password')}}"><i class="icon-lock2"></i> 修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin.config.cache')}}"><i class="icon-chrome"></i> 清除缓存</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin.config.index')}}"><i class="icon-cog7"></i> 个人设置</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit();"><i class="icon-stop"></i>退出账号</a>
                        <form id="logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

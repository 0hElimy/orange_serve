<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="javascript:;" class="media-left">
                        @if(auth('admin')->user()->image == "")
                            <img src="/vendor/limitui/images/placeholder.jpg" class="img-circle img-sm">
                        @else
                            <img src="{{auth('admin')->user()->image}}">
                        @endif
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{auth('admin')->user()->name}}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;China WuHan
                        </div>
                    </div>
                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="{{route('admin.config.index')}}"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="{{ $_admin ?? '' }}"><a href="/admin"><i class="icon-home4"></i>
                            <span>首页</span></a></li>
                    <!-- Main -->
                    <li class="navigation-header"><span>商城中心</span> <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="icon-cart2"></i> <span>商城管理</span></a>
                        <ul>
                            <li class="{{ $_product ?? '' }}"><a href="{{route('admin.products.index')}}">商品管理</a></li>
                            <li class="">
                                <a href="javascript:;" class="has-ul">促销管理</a>
                                <ul class="hidden-ul" style="display: none;">
                                    <li><a href="starters/3_col_dual.html">库存警告商品</a></li>
                                    <li><a href="starters/3_col_double.html">促销商品</a></li>
                                </ul>
                            </li>
                            <li class="{{ $_brand ?? '' }}"><a href="{{route('admin.brands.index')}}">商品品牌</a></li>
                            <li class="{{ $_category ?? '' }}"><a href="{{route('admin.categories.index')}}">商品分类</a></li>
                            <li class="{{ $_logistic ?? '' }}"><a href="{{route('admin.logistics.index')}}">物流运费</a></li>
                            <li class="{{ $_user ?? '' }}"><a href="{{route('admin.categories.index')}}">会员管理</a></li>
                            <li class="{{ $_order ?? '' }}"><a href="{{route('admin.categories.index')}}">订单管理</a></li>
                        </ul>
                    </li>
                    <!-- /main -->

                    <!-- Forms -->
                    <li class="navigation-header"><span>广告中心</span> <i class="icon-menu" title="Forms"></i>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="icon-bubble-notification"></i> <span>广告管理</span></a>
                        <ul>
                            <li class="{{ $_advert ?? '' }}"><a href="{{route('admin.adverts.index')}}">广告列表</a></li>
                            <li class="{{ $_advertCategory ?? '' }}"><a href="{{route('admin.advertCategories.index')}}">广告分类</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>

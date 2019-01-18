@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="javascript:;"><i class="icon-home2 position-left"></i> 首页</a></li>
                    <li><a href="javascript:;">商品管理</a></li>
                    <li class="active">Products Manage</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->

    @include('layouts.admin.shared._flash')

    <!-- Content area -->
        <div class="content">
            <!-- Table with togglable columns -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('admin.products.create')}}" class="btn btn-success btn-labeled btn-xs"><b><i class="icon-plus2"></i></b>新增</a>
                    <a href="javascript:;" class="btn btn-danger btn-labeled btn-xs del_all" data-controller="products"><b><i class="icon-trash"></i></b>删除</a>
                </div>

                <table class="table table-togglable table-hover">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox" id="check_all"/></th>
                        <th>#</th>
                        <th data-hide="phone">商品名称</th>
                        <th data-hide="phone">所属分类</th>
                        <th data-hide="phone">缩略图</th>
                        <th data-hide="phone">所属品牌</th>
                        <th data-hide="phone">单价</th>
                        <th data-hide="phone">库存</th>
                        <th data-hide="phone">上架</th>
                        <th data-hide="phone">排序</th>
                        <th data-hide="phone">创建日期</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr data-id="{{$product->id}}" data-attr="products">
                            <td><input type="checkbox" class="checked_id" name="checked_id[]" value="{{$product->id}}"/>
                            </td>
                            <td>{{$product->id}}</td>
                            <td><a href="javascript:;">{{str_limit($product->pro_name, 15, $end = '...')}}</a></td>
                            <td>
                                <a href="javascript:;"><span class="label label-info">{{ $product->categories->implode('name', ', ') }}</span></a>
                            </td>
                            <td><img src="{{$product->image}}" alt="" style="width: 80px;height: 60px;"></td>
                            <td><span class="label label-warning">{{$product->brand->name}}</span></td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{!! is_something($product, 'is_onsale') !!}</td>
                            <td>{{$product->sort}}</td>
                            <td><span class="label label-success">{{$product->created_at->format('Y年m月d日')}}</span></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="{{route('admin.products.edit', $product->id)}}"><i class="icon-pencil"></i>
                                                    编辑
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.products.destroy', $product->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="确定要删除么?"><i class="icon-trash"></i>
                                                    删除
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div style="margin: 30px 0 10px 10px;">
                    <p>共 {{$products->total()}} 条记录</p>

                    <div class="text-right" style="margin:0 10px 10px 0">
                        {!! $products->appends(Request::all())->links() !!}
                    </div>
                </div>

            </div>
            <!-- /table with togglable columns -->

            <!-- Footer -->
        @include('layouts.admin.shared._footer')
        <!-- /footer -->
        </div>
        <!-- /content area -->
    </div>
@endsection

@section('js')
    <script src="/js/admin/product.js"></script>
@endsection
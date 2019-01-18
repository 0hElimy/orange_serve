<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\ValidateProduct;

class ProductController extends Controller
{
    function __construct()
    {
        view()->share([
            '_product' => 'active',
            'categories' => Category::all_categories(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand', 'categories')->orderBy('sort', 'desc')->paginate(env('pageSize'));
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request)
    {
        $product = Product::create($request->all());

        //商品相册插入相册表
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $product->product_galleries()->create(['imgs' => $img]);
            }
        }

        //商品所属分类
        $product->categories()->sync($request->category_id); //同步分类数据

        //插入商品属性
        $proper_names = $request->name;
        $proper_values = $request->value;

        //接收过来的两个数组重新组装成json格式
        $count = count($proper_names);
        for ($i = 0; $i < $count; $i++) {
            $array[] = ['name' => $proper_names[$i], 'value' => $proper_values[$i]];
        }

//        return $array;

        //通过循环插入
        foreach ($array as $k => $v) {
            $product->product_properties()->create([
                'name' => $v['name'],
                'value' => $v['value'],
            ]);
        }

        return redirect(route('admin.products.index'))->with('success', '新增商品成功~');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('product_galleries', 'product_properties')->find($id);

        //查出当前商品对应的分类ID
        $p_categories = $product->categories->pluck('id');
        return view('admin.product.edit', compact('product', 'p_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateProduct $request, $id)
    {
        $product = Product::find($id);

        //先同步分类
        $product->categories()->sync($request->category_id);

        //更新商品
        $product->update($request->all());

        //更新商品相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $product->product_galleries()->create(['imgs' => $img]);
            }
        }

        //更新商品属性
        $proper_names = $request->name;
        $proper_values = $request->value;
        $proper_pids = $request->id;
        $collection = collect($proper_pids);
        $unique = $collection->unique();

        //接收过来的两个数组重新组装成json格式
        $count = count($proper_names);
        for ($i = 0; $i < $count; $i++) {
            $array[] = ['name' => $proper_names[$i], 'value' => $proper_values[$i], 'pid' => $unique->values()[$i]];
        }

        //通过循环更新
        foreach ($array as $k => $v) {
            ProductProperty::where('id', $v['pid'])->update([
                'name' => $v['name'],
                'value' => $v['value'],
            ]);
        }

        return redirect(route('admin.products.index'))->with('success', '编辑商品成功~');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        \DB::table('category_product')->where('product_id', $id)->delete();
        \DB::table('product_galleries')->where('product_id', $id)->delete();
        \DB::table('product_properties')->where('product_id', $id)->delete();

        return back()->with('success', '删除商品成功~');
    }

    /***
     * 编辑商品--删除属性
     * @param Request $request
     */
    public function destroy_attr(Request $request)
    {
        ProductProperty::destroy($request->id);
    }

    /***
     * 编辑商品--删除相册
     * @param Request $request
     */
    public function destroy_gallery(Request $request)
    {
        ProductGallery::destroy($request->id);
    }

    /***
     * 改变属性
     * @param Request $request
     * @return array
     */
    public function change_attr(Request $request)
    {
        $product = Product::find($request->id);
        $attr = $request->attr;
        $product->$attr = !$product->$attr;
        $product->save();
    }

    /***
     * 多选删除
     * @param Request $request
     */
    public function destroy_checked(Request $request)
    {
        Product::destroy($request->checked_id);
        $data = ['status' => 1, 'msg' => '删除商品成功'];
        return response()->json($data);
    }
}

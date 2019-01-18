<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateBrand;

class BrandController extends Controller
{
    function __construct()
    {
        view()->share([
            '_brand' => 'active',
            'categories' => Category::all_categories()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //分类管理--查看品牌
        $where = function ($query) use ($request) {
            if ($request->has('category_id') and $request->category_id != '-1') {

                $query->where('category_id', $request->category_id);
            }
        };
        $brands = Brand::with('category')->where($where)->orderBy('sort', 'desc')->paginate(env('pageSize'));
//        return view('admin.brand.index', compact('brands'));
        return response()->json($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateBrand $request)
    {
        Brand::create($request->all());
//        return redirect(route('admin.brands.index'))->with('success', '新增品牌成功');
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
        $brand = Brand::find($id);
        return response()->json($brand);
//        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateBrand $request, $id)
    {
        $brand = Brand::find($id);
        $brand->update($request->all());
        return response()->json($brand);
//        return redirect(route('admin.brands.index'))->with('success', '编辑品牌成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
//        return back()->with('success', '删除品牌成功');
    }

    /***
     * 改变属性
     * @param Request $request
     * @return array
     */
    public function change_attr(Request $request)
    {
        $brand = Brand::find($request->id);
        $attr = $request->attr;
        $brand->$attr = !$brand->$attr;
        $brand->save();
    }

    /***
     * 多选删除
     * @param Request $request
     */
    public function destroy_checked(Request $request)
    {
        Brand::destroy($request->checked_id);
        $data = ['status' => 1, 'msg' => '删除品牌成功'];
        return response()->json($data);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCategory;

class CategoryController extends Controller
{
    function __construct()
    {
        view()->share([
            '_category' => 'active',
            'categories' => Category::all_categories()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all_categories();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCategory $request)
    {
       $category = Category::create($request->all());
       return response()->json($category);
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
        $cate = Category::find($id);
        return response()->json($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Category::check_children($id)) {
            return response()->json(['status' => 0, 'msg' => '当前分类有二级分类，请先将对应二级分类删除后再尝试删除~']);
        }

        if (!Category::check_brands($id)) {
            return response()->json(['status' => 0, 'msg' => '当前分类有品牌，请先将对应品牌删除后再尝试删除~']);
        }
        Category::destroy($id);
        return response()->json(['status' => 1, 'msg' => '删除分类成功~']);

    }

    /**
     * Ajax排序
     * @param Request $request
     * @return array
     */
    function sort(Request $request)
    {
        $category = Category::find($request->id);
        $category->sort = $request->sort;
        $category->save();
    }

    /***
     * 改变属性
     * @param Request $request
     * @return array
     */
    public function change_attr(Request $request)
    {
        $category = Category::find($request->id);
        $attr = $request->attr;
        $category->$attr = !$category->$attr;
        $category->save();
    }
}

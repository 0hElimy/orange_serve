<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdvertCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertCategoryController extends Controller
{
    function __construct()
    {
        view()->share([
            '_advertCategory' => 'active',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertCategories = AdvertCategory::orderBy('sort')->get();
        return view('admin.advertCategory.index', compact('advertCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = AdvertCategory::create($request->all());
        $data = ['info' => $info, 'status' => 1, 'msg' => '新增分类成功'];
        return response()->json($data);
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
        $category = AdvertCategory::find($id);
        $category->update($request->all());
        $data = ['status' => 1, 'msg' => '编辑分类成功'];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdvertCategory::destroy($id);
        $data = ['status' => 1, 'msg' => '删除分类成功'];
        return response()->json($data);
    }
}

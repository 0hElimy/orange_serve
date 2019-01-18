<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advert;
use App\Models\AdvertCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAdvert;

class AdvertController extends Controller
{
    function __construct()
    {
        view()->share([
            '_advert' => 'active',
            'categories' => AdvertCategory::all()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::with('category')->orderBy('sort')->paginate(env('pageSize'));
        return view('admin.advert.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateAdvert $request)
    {
        Advert::create($request->all());
        return redirect(route('admin.adverts.index'))->with('success', '新增广告成功');
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
        $advert = Advert::find($id);
        return view('admin.advert.edit', compact('advert'));
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
        $advert = Advert::find($id);
        $advert->update($request->all());
        return redirect(route('admin.adverts.index'))->with('success', '编辑广告成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advert::destroy($id);
        return back()->with('success', '删除广告成功');
    }

    /***
     * 多选删除
     * @param Request $request
     */
    public function destroy_checked(Request $request)
    {
        Advert::destroy($request->checked_id);
        $data = ['status' => 1, 'msg' => '删除广告成功'];
        return response()->json($data);
    }
}

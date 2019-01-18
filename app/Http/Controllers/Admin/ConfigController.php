<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.config.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Admin::create([
            'image' => $request->image
        ]);
        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /***
     * 加载清除缓存页面
     */
    public function cache()
    {
        return view('admin.config.cache');
    }


    /**
     * 执行清除缓存
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function cache_destroy()
    {
        Cache::flush();
        return back()->with('success', '清除缓存成功~');
    }

    /***
     * 加载修改密码页面
     */
    public function change_password()
    {
        return view('admin.config.change_password');
    }

    /**
     * 执行修改密码
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_password(Request $request)
    {
        $user = auth('admin')->user();

        if (!\Hash::check($request->oldpassword, $user->password)) {
            return back()->with('error', '原始密码输入错误~');
        }

        if ($request->password == '') {
            return back()->with('error', '请输入新密码~');
        }

        if ($request->password != $request->newpassword) {
            return back()->with('error', '两次密码输入不一致~');
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();
        $request->session()->invalidate(); //修改密码后，清除session，退到登录页面

        return redirect(route('admin.login'))->with('success', '您已成功修改密码,请重新登录~');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateLogistic;

class LogisticController extends Controller
{
    function __construct()
    {
        view()->share([
            '_logistic' => 'active',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logistics = Logistic::orderBy('sort', 'desc')->paginate(env('pageSize'));
        return response()->json($logistics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logistic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateLogistic $request)
    {
        $logistic = Logistic::create($request->all());
        return response()->json($logistic);
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
        $logistic = Logistic::find($id);
        return response()->json($logistic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateLogistic $request, $id)
    {
        $logistic = Logistic::find($id);
        $logistic->update($request->all());
        return response()->json($logistic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logistic::destroy($id);
    }

    /***
     * 改变属性
     * @param Request $request
     * @return array
     */
    public function change_attr(Request $request)
    {
        $logistic = Logistic::find($request->id);
        $attr = $request->attr;
        $logistic->$attr = !$logistic->$attr;
        $logistic->save();
    }

    /***
     * 多选删除
     * @param Request $request
     */
    public function destroy_checked(Request $request)
    {
        Logistic::destroy($request->checked_id);
        $data = ['status' => 1, 'msg' => '删除物流成功'];
        return response()->json($data);
    }
}

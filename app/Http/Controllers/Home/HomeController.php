<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /***
     * 前端首页
     */
    public function index()
    {
        return view('home.index');
    }
}

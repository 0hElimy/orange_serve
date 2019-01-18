<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //上传图片
    public function store(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $allow_types = ['image/png', 'image/jpeg', 'image/gif'];
            if (!in_array($request->image->getMimeType(), $allow_types)) {
                return ['status' => 0, 'msg' => '图片类型不正确！'];
            }

            if ($request->image->getClientSize() > 1024 * 1024 * 20) {
                return ['status' => 0, 'msg' => '图片大小不能超过 20M！'];
            }

            $path = $request->image->store('public/images');


            //上传到本地
//            return ['status' => 1, 'msg' => '/storage' . str_replace('public', '', $path)];

            //上传到七牛
            $file_path = storage_path('app/') . $path;

            qiniu_upload($file_path);

            return ['msg' => 'http://image.holyzq.com/' . basename($file_path)];

        }
    }
}

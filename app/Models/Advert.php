<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $guarded = [];

    //广告属于分类
    public function category()
    {
        return $this->belongsTo('App\Models\AdvertCategory');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'category_id', 'sort', 'is_show'];

    //品牌属于一级分类，与二级分类无关
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}

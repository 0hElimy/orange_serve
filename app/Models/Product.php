<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['file', 'category_id', 'imgs', 'name', 'value'];

    //每个商品属于一个品牌
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    //商品可以属于多个分类
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    //一个商品有很多相册图片
    public function product_galleries()
    {
        return $this->hasMany('App\Models\ProductGallery');
    }

    //一个商品有很多属性
    public function product_properties()
    {
        return $this->hasMany('App\Models\ProductProperty');
    }
}

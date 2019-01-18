<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['parent_id', 'name', 'is_show', 'sort', 'desc'];

    //每个一级分类有很多二级分类
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    /***
     * 所有分类
     * @return mixed
     */
    static function all_categories()
    {
        $categories = self::where('parent_id', 0)->orderBy('sort')->get();
        foreach ($categories as $k => $v) {
            $id = $v['id'];

            $category = self::where('parent_id', $id)->orderBy('sort')->get();
            $categories[$k]['children'] = $category;

            //查出每个一级分类对应的所有品牌
            $brands = Brand::where('category_id', $id)->get();
            $categories[$k]['brands'] = $brands;
        }
        return $categories;
    }

    //每个一级分类有很多品牌
    public function brands()
    {
        return $this->hasMany('App\Models\Brand');
    }

    /**
     * 检查是否有子分类
     */
    static function check_children($id)
    {
        $category = self::with('children')->find($id);
        if ($category->children->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     * 检查当前分类是否有品牌
     */
    static function check_brands($id)
    {
        $category = self::with('brands')->find($id);
        if ($category->brands->isEmpty()) {
            return true;
        }
        return false;
    }

    //一个分类有多个商品
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}

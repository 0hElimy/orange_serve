<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/***
 * 前端路由
 */
Auth::routes();
Route::namespace('Home')->group(function () {
    //首页
    $this->get('/', 'HomeController@index');
});

//上传图片
$this->resource('photos', 'PhotoController')->only('store');

/***
 * 后台路由
 */
Route::prefix('admin')->namespace('Admin')->group(function () {
    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
    Route::middleware('auth.admin:admin')->name('admin.')->group(function () {
        $this->get('/', 'DashboardController@index');

        //商品品牌
        Route::prefix('brands')->group(function () {
            $this->delete('destroy_checked', 'BrandController@destroy_checked');//删除多条
            $this->patch('change_attr', 'BrandController@change_attr');//改变属性
        });
        $this->resource('brands', 'BrandController');

        //分类管理
        Route::prefix('categories')->group(function () {
            $this->patch('change_attr', 'CategoryController@change_attr');//改变属性
            $this->patch('sort', 'CategoryController@sort');//排序
        });
        $this->resource('categories', 'CategoryController');

        //商品管理
        Route::prefix('products')->group(function () {
            $this->delete('destroy_attr', 'ProductController@destroy_attr');//编辑--删除属性
            $this->delete('destroy_gallery', 'ProductController@destroy_gallery');//编辑--删除相册
            $this->delete('destroy_checked', 'ProductController@destroy_checked');//删除多条
            $this->patch('change_attr', 'ProductController@change_attr');//改变属性
        });
        $this->resource('products', 'ProductController');

        //广告管理
        Route::prefix('adverts')->group(function () {
            $this->delete('destroy_checked', 'AdvertController@destroy_checked');//删除多条
        });
        $this->resource('adverts', 'AdvertController');

        //广告分类
        $this->resource('advertCategories', 'AdvertCategoryController')->except('show', 'create', 'edit');

        //物流运费
        Route::prefix('logistics')->group(function () {
            $this->delete('destroy_checked', 'LogisticController@destroy_checked');//删除多条
            $this->patch('change_attr', 'LogisticController@change_attr');//改变属性
        });
        $this->resource('logistics', 'LogisticController');

        //个人设置、清除缓存、修改密码
        Route::prefix('config')->group(function () {
            $this->get('cache', 'ConfigController@cache')->name('config.cache');//清除缓存
            $this->delete('cache_destroy', 'ConfigController@cache_destroy')->name('config.cache_destroy');//执行清除

            $this->get('/change_password', 'ConfigController@change_password')->name('config.change_password');  //加载修改密码页面
            $this->put('/update_password', 'ConfigController@update_password')->name('config.update_password');  //执行修改密码
        });
        $this->resource('config', 'ConfigController')->only('index', 'store');
    });
});

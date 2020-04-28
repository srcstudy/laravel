<?php

use Illuminate\Support\Facades\Route;

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


//=========================================测试=========================================
Route::get('/', function () {
    return view('welcome');//resources\views\welcome.blade.php
});


Route::get('return_arr_test', function () {
    $arr = array();
    $arr['name'] = 'elesos';
    $arr['age']  = 2020;
    return $arr;
});


//这2个路由是创建认证系统后自动生成的
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//


//==================================
//添加认证路由， 给路由添加中间件auth
//给路由命名，方便以后生成url或重定向
Route::get('/post', 'PostController@article_auth')->middleware('auth')->name('finance_auth');
//提交数据
Route::get('/update_post/{name}/{article_id}', 'PostController@update_post');

//远程主页
Route::get('/remote', function (){
    return view('remote.home', ['modules' => config('article.house_category_info.tag_names')]);
});
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
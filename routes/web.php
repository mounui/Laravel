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

Route::get('/', function () {
    return view('welcome');
});

// GET请求路由
Route::get('/get',function(){
    return "Hello Laravel Route::get()";
});

// POST请求路由
Route::get('/testPost',function(){
    $csrf_token = csrf_token();
    $form = <<<FORM
<form action="/hello' method="POST">
    <input type="hidden" name="_token" value="{$csrf_token}">
    <input type="submit" value="Test"/>
</form>
FORM;
    return $form;
});
Route::post('/hello',function(){
    return "Hello Laravel Route::post()";
});

// 其他请求路由
/**
Route::match(['get','post'],'/match',function(){
    return "Hello Laravel Route::match()";
});
Route::any('/any',function(){
    return "Hello Laravel Route::any()";
});
 */
// 路由参数使用
// 必须参数
Route::get('hello/{name}',function($name){
    return "Hello {$name}!";
});


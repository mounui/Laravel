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
<form action="/hello" method="POST">
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
Route::match(['get','post'],'/match',function(){
    return "Hello Laravel Route::match()";
});
Route::any('/any',function(){
    return "Hello Laravel Route::any()";
});
// 路由参数使用
// 必须参数
Route::get('hello/{name}',function($name){
    return "Hello {$name}!";
});
Route::get('/double/{name}/by/{user}',function($name,$user){
    return "Hello {$name} by {$user}!";
});
// 可选参数
Route::get('/kexuan/{name?}',function($name="Laravel"){
    return "Hello {$name}!";
});

// 正则约束
Route::get('/regexp/{name?}',function($name="Laravel"){
    return "Hello {$name}!";
})->where('name','[A-Za-z]+');

// 路由命名
Route::get('/hello/laravelacademy',['as'=>'academy',function(){
    return 'Hello LaravelAcademy！';
}]);
Route::get('/testNamedRoute',function(){
   return route('academy');
});
Route::get('/testNamedRoute',function(){
    return redirect()->route('academy');
});
Route::get('/hello/wujing/{id}',['as'=>'wujing',function($id){
    return 'Hello wujing'.$id.'！';
}]);
Route::get('/wujing',function(){
   return redirect()->route('wujing',['id'=>'love']); 
});
Route::group(['as' => 'admin::'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        //
    }]);
});
Route::get('/testdashboard',function(){
    return route('admin::dashboard');
});

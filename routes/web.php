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
    // return "Hello Laravel Route::get()";
    $environment = App::environment();
    $environment = getenv('REMOTE_ADDR');
    // var_dump($environment);
    // var_dump(function_exists('config'));
    // config(['app.timezone'=>'Asia/Shanghai']);
    $value = config('app.timezone');
    var_dump($value);
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
    // return "Hello Laravel Route::post()";
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
/*Route::get('/hello/laravelacademy',['as'=>'academy',function(){
    return 'Hello LaravelAcademy！';
}]);
Route::get('/testNamedRoute',function(){
   return route('academy');
});
Route::get('/testNamedRoute',function(){
    return redirect()->route('academy');
});*/
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

// 路由分组
Route::group(['middleware'=>'test'],function(){
    Route::get('/write/laravelacademy',function(){
        //使用Test中间件
    });
    Route::get('/update/laravelacademy',function(){
       //使用Test中间件
    });
});

Route::get('/age/refuse',['as'=>'refuse',function(){
    return "未成年人禁止入内！";
}]);

// 命名空间
// 默认情况下，routes.php中的定义的控制器位于App\Http\Controllers命名空间下，所以如果要指定命名空间，只需指定App\Http\Controllers之后的部分即可：
Route::group(['namespace' => 'LaravelAcademy'], function(){
    // 控制器在 "App\Http\Controllers\LaravelAcademy" 命名空间下

    Route::group(['namespace' => 'DOCS'], function()
    {
        // 控制器在 "App\Http\Controllers\LaravelAcademy\DOCS" 命名空间下
    });
});

// 子域名
// 子域名可以通过domain关键字来设置：
Route::group(['domain'=>'{service}.laravel.app'],function(){
    Route::get('/write/laravelacademy',function($service){
        return "Write FROM {$service}.laravel.app";
    });
    Route::get('/update/laravelacademy',function($service){
        return "Update FROM {$service}.laravel.app";
    });
});

// 路由前缀
Route::group(['prefix'=>'laravelacademy'],function(){
    Route::get('write',function(){
        return "Write LaravelAcademy";
    });
    Route::get('update',function(){
        return "Update LaravelAcademy";
    });
});

Route::group(['prefix'=>'laravelacademy/{version}'],function(){
    Route::get('write',function($version){
        return "Write LaravelAcademy {$version}";
    });
    Route::get('update',function($version){
        return "Update LaravelAcademy {$version}";
    });
});
/* csrf */
Route::get('testCsrf',function(){
    $csrf_field = csrf_field();
    $html = <<<GET
        <form method="POST" action="/testCsrf">
            <input type="submit" value="Test"/>
        </form>
GET;
    return $html;
});

Route::post('testCsrf',function(){
    return 'Success!';
});
/* Route::resource('post','PostController'); */
// Route::resource('get','UserController');
/*Route::get('dashboard', function () {
    return redirect('home/dashboard');
});*/

/*Route::get('/hello/laravelacademy/{id}',['as'=>'academy',function($id){
    return 'Hello LaravelAcademy'.$id;
}]);

Route::get('testResponseRedirect',function(){
    // echo route('academy');exit;
    return redirect()->route('academy',100);
});*/

/*Route::resource('post','PostController');

Route::get('testResponseRedirect',function(){
    return redirect()->action('PostController@show',[1]);
});*/

/*Route::post('user/profile', function () {
    // 更新用户属性...
    return redirect('dashboard')->with('status', 'Profile updated!');
});*/

/*use Illuminate\Support\Facades\Cache;
Route::get('/cache', function () {
    $a = Cache::get('key');
});*/

/*Route::get('/mao', function() {
    echo 'Hello world!';
});
Route::redirect('/here', '/there', 301);*/

Route::get('mao/{id}',function($id){
    echo 'Id is '.$id;
})->where('id','[0-9]');
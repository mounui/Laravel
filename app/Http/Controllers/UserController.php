<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 存储新用户
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        // $content = 'Hello LaravelAcademy！';
    // $status = 200;
    // $value = 'text/html;charset=utf-8';
    /* return response($content,$status)->header('Content-Type',$value)->withCookie('site','laravel.home'); */
    // return view('hello',['message'=>'Hello LaravelAcademy']);
    // return response()->json(['name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org'])->setCallback(request()->input('callback'));
    }
    public function update(Request $request, $id)
    {
        /* echo 'Id is' . $id; */
        $uri = $request->path();
        $uri = $request->url();
        $uri = $request->method();
        $uri = $request->all();
        $uri = $request->input('id');
        $uri = $request->has('id');
        /* $request->session()->flash('status','test'); */
        $request->session()->regenerate();
        $data = $request->session()->all();
        var_dump($data);
        /* var_dump($uri); */
        /* echo $uri; */
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

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
        $content = 'Hello LaravelAcademy！';
    $status = 200;
    $value = 'text/html;charset=utf-8';
    /* return response($content,$status)->header('Content-Type',$value)->withCookie('site','laravel.home'); */
    // return view('hello',['message'=>'Hello LaravelAcademy']);
    return response()->json(['name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org'])->setCallback(request()->input('callback'));
    }
}


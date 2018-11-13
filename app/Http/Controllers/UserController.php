<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 存储新用户
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        echo $name;
        //
    }
}

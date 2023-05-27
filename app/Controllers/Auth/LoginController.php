<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'login';
        
        $Login = [
            'title'     => $uri,
            'data'      => '',
            'content'   => 'Pages/auth/'.$uri.'/index'
        ];

        return view('Pages/auth/index', $Login);
    }
}

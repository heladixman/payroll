<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $mythAuthConfig = config('Myth\Auth\Config\Auth');
        $mythAuthConfig->views['login'] = 'Pages/auth/login'; // Replace 'login' with the view you want to customize

        // You can add more customized views by repeating the line above with different view names

        $mythAuth = new Myth\Auth\Auth($mythAuthConfig);

    }
}

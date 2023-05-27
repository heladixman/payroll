<?php

namespace App\Controllers\Auth;

// use App\Controllers\BaseController;
use Myth\Auth\Controllers\AuthController as MythAuthController;

class AuthController extends MythAuthController
{
    // Custom login logic
    public function login()
    {
        // parent::attemptLogin();
        return view('Pages/auth/login/index');
    }

    // public function register()
    // {
    //     parent::attemptLogin();
    // }
}

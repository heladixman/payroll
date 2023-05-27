<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title'             => 'Welcome',
            'breadcrumbs'       => "Dashboard",
            'addNewButton'      => "Tambah Data",
        ];
        echo view('Pages/auth/login', $data);
    }

    public function signup()
    {
        $data = [
            'title'             => 'Sign Up',
            'breadcrumbs'       => "Dashboard",
            'addNewButton'      => "Tambah Data",
        ];
        echo view('Pages/auth/register', $data);
    }
}

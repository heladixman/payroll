<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'settings';
        
        $Settings = [
            'title'     => $uri,
            'data'      => '',
            'content'   => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Settings);
    }
}

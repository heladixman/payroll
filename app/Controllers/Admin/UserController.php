<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'list';
        $parent     = 'employee';
        
        $User = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $User);
    }
}

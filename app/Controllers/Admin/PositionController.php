<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PositionController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'position';
        $parent     = 'settings';
        
        $Position = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Position);
    }
}

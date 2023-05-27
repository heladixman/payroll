<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserBonusController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'bonus';
        $parent     = 'employee';
        
        $UserBonus = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $UserBonus);
    }
}

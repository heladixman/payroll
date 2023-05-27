<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DeductionController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'deduction';
        $parent     = 'settings';
        
        $Deduction = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Deduction);
    }
}

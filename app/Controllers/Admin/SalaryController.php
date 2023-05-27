<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SalaryController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'salary';
        $parent     = 'settings';
        
        $Salary = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Salary);
    }
}

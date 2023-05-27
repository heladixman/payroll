<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Departments;

class DepartmentController extends BaseController
{
    protected $departments;

    public function __construct()
    {
        $this->departments = new Departments();
    }

    public function index()
    {
        $base_url   = base_url();
        $uri        = 'department';
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

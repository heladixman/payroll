<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Departments;

class DepartmentController extends BaseController
{
    public function __construct(){
        $this->departments = new Departments;
    }

    public function index()
    {
        $base_url   = base_url();
        $uri        = 'department';
        $parent     = 'settings';
        
        $Department = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->departments->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Department);
    }
}

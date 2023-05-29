<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Salaries;

class SalaryController extends BaseController
{
    public function __construct(){
        $this->salaries = new Salaries();
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'salary';
        $parent     = 'settings';
        
        $Salary = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->salaries->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Salary);
    }
}

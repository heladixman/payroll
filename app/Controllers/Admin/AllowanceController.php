<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Allowance;

class AllowanceController extends BaseController
{
    public function __construct(){
        $this->allowance = new Allowance;
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'allowance';
        $parent     = 'settings';
        
        $Allowance = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'allowance' => $this->allowance->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Allowance);
    }
}

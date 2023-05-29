<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Deduction;

class DeductionController extends BaseController
{
    public function __construct(){
        $this->deduction = new Deduction;
    }

    public function index()
    {
        $base_url   = base_url();
        $uri        = 'deduction';
        $parent     = 'settings';
        
        $Deduction = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->deduction->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Deduction);
    }
}

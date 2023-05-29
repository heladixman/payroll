<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WebData;

class WebDataController extends BaseController
{
    public function __construct(){
        $this->webdata = new WebData();
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'web-data';
        $parent     = 'settings';
        
        $WebData = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->webdata->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $WebData);
    }
}

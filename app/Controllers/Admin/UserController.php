<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Users;

class UserController extends BaseController
{
    public function __construct(){
        $this->list = new Users;
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'list';
        $parent     = 'employee';
        
        $User = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->list->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $User);
    }
}

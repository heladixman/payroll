<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Bonus;

class BonusController extends BaseController
{
    public function __construct(){
        $this->bonus = new Bonus;
    }

    public function index()
    {
        $base_url   = base_url();
        $uri        = 'bonus';
        $parent     = 'settings';
        
        $Bonus = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->bonus->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Bonus);
    }
}

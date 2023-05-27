<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PaymentMethodController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'payment-method';
        $parent     = 'settings';
        
        $PaymentMethod = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $PaymentMethod);
    }
}

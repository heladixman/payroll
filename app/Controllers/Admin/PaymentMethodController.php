<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaymentMethod;

class PaymentMethodController extends BaseController
{
    public function __construct(){
        $this->paymentmethod = new PaymentMethod();
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'payment-method';
        $parent     = 'settings';
        
        $PaymentMethod = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->paymentmethod->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $PaymentMethod);
    }
}

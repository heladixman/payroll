<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserDeduction;

class UserDeductionController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->userDeduction = new UserDeduction();
    }

    public function indexDeduction()
    {
        $base_url   = base_url();
        $uri        = 'deduction';
        $parent     = 'employee';
        
        $Deduction = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'deduction' => $this->userDeduction->select('user_deductions.id as id, users.name as user_name, deductions.name as deduction_name, amount, type, effective_date')->join('users', 'user_deductions.user_id = users.id')->join('deductions', 'user_deductions.deduction_id = deductions.id')->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Deduction);
    }
}

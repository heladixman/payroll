<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserAllowance;

class UserAllowanceController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->userAllowance = new userAllowance();
    }

    public function indexAllowance()
    {
        $base_url   = base_url();
        $uri        = 'allowance';
        $parent     = 'employee';
        
        $Attendance = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'attendance'=> $this->userAllowance->select('user_allowances.id as id, allowances.name as allowance_name, users.name as user_name, type, effective_date, amount')->join('users', 'user_allowances.user_id = users.id')->join('allowances', 'user_allowances.allowance_id = allowances.id')->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Attendance);
    }
}

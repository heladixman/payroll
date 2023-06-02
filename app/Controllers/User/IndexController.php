<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserAllowance;
use App\Models\Attendance;

class IndexController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->userAllowance = new userAllowance();
        $this->attendance = new Attendance();
    }
    public function indexUser()
    {
        $base_url   = base_url();
        $uri        = 'home';
        
        $Allowance = [
            'title'         => $uri,
            'attendance'    => '',
            'allowance'     => $this->userAllowance->findAll(),
            'content'       => 'Pages/user/'.$uri.'/index'
        ];

        return view('Pages/user/index', $Allowance);
    }
}

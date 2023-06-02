<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Leave;


class LeaveController extends BaseController
{

    public function __construct(){
        helper('form');
        $this->leave = new Leave();
    }

    public function indexLeave()
    {
        $base_url   = base_url();
        $uri        = 'Leave';
        $parent     = 'Employee';
        
        $UserLeave = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'leave'     => $this->leave->select('leave.id as id, users.name as user_name, leave_start, leave_end, reason, prove, total_leave, leave.status as status_leave')->join('users', 'leave.user_id = users.id')->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $UserLeave);
    }
}

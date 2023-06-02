<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Attendance;

class AttendanceController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->attendance = new Attendance();
    }

    public function indexAttendance()
    {
        $base_url   = base_url();
        $uri        = 'attendance';
        $parent     = 'employee';
        
        $Attendance = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'attendance'=> $this->attendance->select('attendances.id as id, users.user_number as user_number, users.name as user_name, user_id, log_type, datetime_log')->join('users', 'attendances.user_id = users.id')->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Attendance);
    }
}

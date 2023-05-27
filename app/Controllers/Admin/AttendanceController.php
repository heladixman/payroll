<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AttendanceController extends BaseController
{
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'attendance';
        $parent     = 'employee';
        
        $Attendance = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => '',
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Attendance);
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Allowance;
use App\Models\Bonus;
use App\Models\Deduction;
use App\Models\Departments;
use App\Models\Positions;
use App\Models\Attendance;
use App\Models\Users;
use App\Models\Leave;

class DashboardController extends BaseController
{
    public function __construct(){
        $this->allowance = new Allowance();
        $this->bonus = new Bonus();
        $this->deduction = new Deduction();
        $this->departments = new Departments();
        $this->position = new Positions();
        $this->attendance = new Attendance();
        $this->users = new Users();
        $this->leave = new Leave();
    }

    public function index()
    {
        $base_url       = base_url();
        $uri            = 'dashboard';
        date_default_timezone_set('Asia/Jakarta');
        $current_date   = date('Y-m-d');

        $Dashboard = [
            'title'     => $uri,
            'this_date' => $current_date,
            'present'   => $this->attendance->select('*')->where('DATE(datetime_log)', $current_date)->where('log_type', '1')->countAll(),
            'absent'    => $this->users->countAll() - $this->attendance->select('*')->where('DATE(datetime_log)', $current_date)->where('log_type', '1')->countAll(),
            'leave'     => $this->leave->select('*')->where("leave_start BETWEEN '{$current_date}' AND '{$current_date}'")->orwhere("leave_end BETWEEN '{$current_date}' AND '{$current_date}'")->orwhere("leave_start <= '{$current_date}' AND leave_end>= '{$current_date}'")->countAll(),
            'total'     => $this->users->countAll(),
            'data'      => [['name' => 'Allowance',   'count' => $this->allowance->countAll()],
                            ['name' => 'Bonus',       'count' => $this->bonus->countAll()],
                            ['name' => 'Deduction',   'count' => $this->deduction->countAll()],
                            ['name' => 'Department',  'count' => $this->departments->countAll()],
                            ['name' => 'Position',    'count' => $this->position->select('positions.name as position_name, departments.name as department_name, description, salary_start, salary_end, positions.id as id')->join('departments', 'positions.department_id = departments.id')->countAll()]],
            'content'   => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Dashboard);
    }
}

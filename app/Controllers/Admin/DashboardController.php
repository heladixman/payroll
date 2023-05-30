<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Allowance;
use App\Models\Bonus;
use App\Models\Deduction;
use App\Models\Departments;
use App\Models\Positions;
use App\Models\PaymentMethod;
use App\Models\Salaries;
use App\Models\WebData;

class DashboardController extends BaseController
{
    public function __construct(){
        $this->allowance = new Allowance();
        $this->bonus = new Bonus();
        $this->deduction = new Deduction();
        $this->departments = new Departments();
        $this->position = new Positions();
        $this->paymentmethod = new PaymentMethod();
        $this->salary = new Salaries();
        $this->webdata = new WebData();
    }

    public function index()
    {
        $base_url   = base_url();
        $uri        = 'dashboard';
        
        $Dashboard = [
            'title'     => $uri,
            'allowance' => $this->allowance->countAll(),
            'bonus'     => $this->bonus->countAll(),
            'deduction' => $this->deduction->countAll(),
            'department'=> $this->departments->countAll(),
            'position'  => $this->position->select('positions.name as position_name, departments.name as department_name, description, salary_start, salary_end, positions.id as id')->join('departments', 'positions.department_id = departments.id')->countAll(),
            'payment'   => $this->paymentmethod->countAll(),
            'salary'    => $this->salary->countAll(),
            'content'   => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Dashboard);
    }
}

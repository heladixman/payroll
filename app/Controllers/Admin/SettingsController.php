<?php

namespace App\Controllers\Admin;
use App\Models\Allowance;
use App\Models\Departments;
use App\Models\Positions;
use App\Models\PaymentMethod;
use App\Models\Salaries;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function __construct(){
        $this->allowance = new Allowance();
        $this->departments = new Departments();
        $this->position = new Positions();
        $this->paymentmethod = new PaymentMethod();
        $this->salary = new Salaries();
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'settings';
        
        $Settings = [
            'title'     => $uri,
            'data'      => $this->allowance->findAll(),
            'department'=> $this->departments->findAll(),
            'position'  => $this->position->select('positions.name as position_name, departments.name as department_name, description, salary_start, salary_end, positions.id as id')->join('departments', 'positions.department_id = departments.id')->findAll(),
            'payment'   => $this->paymentmethod->findAll(),
            'salary'    => $this->salary->findAll(),
            'content'   => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Settings);
    }
}

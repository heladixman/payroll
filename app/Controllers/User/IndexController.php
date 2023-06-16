<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserAllowance;
use App\Models\UserDeduction;
use App\Models\UserBonus;
use App\Models\Attendance;
use App\Models\PayrollDetails;

class IndexController extends BaseController
{
    public function __construct(){
        $this->userAllowance = new userAllowance();
        $this->userBonus = new userBonus();
        $this->userDeduction = new userDeduction();
        $this->attendance = new Attendance();
        $this->payrolldetails = new PayrollDetails();
    }
    public function indexUser()
    {
        $base_url   = base_url();
        $uri        = 'home';
        $userId     = null;

        if(user()){
            $userId = user()->id;
        }
        
        $Allowance = [
            'title'         => $uri,
            'attendance'    => $this->attendance->select('attendances.id as id, users.user_number as user_number, users.name as user_name, user_id, log_type, datetime_log')->join('users', 'attendances.user_id = users.id')->findAll(),
            'allowance'     => $this->userAllowance->select('allowances.name as allowance_name, user_allowances.id as id, type, effective_date, amount')->join('allowances', 'user_allowances.allowance_id = allowances.id')->where('user_id', $userId)->findAll(),
            'deduction'     => $this->userDeduction->select('deductions.name as deduction_name, user_deductions.id as id, type, effective_date, amount')->join('deductions', 'user_deductions.deduction_id = deductions.id')->where('user_id', $userId)->findAll(),
            'bonus'         => $this->userBonus->select('bonus.name as bonus_name, effective_date, amount')->join('bonus', 'user_bonus.bonus_id = bonus.id')->where('user_id', $userId)->findAll(),
            'payslip'       => $this->payrolldetails->select('payrolls.reff_no as reff_no, payroll_details.createAt as dateCreate, payroll_details.id as id, net_salary')->join('payrolls', 'payroll_details.payroll_id = payrolls.id')->where('user_id', $userId)->findAll(),
            'content'       => 'Pages/user/'.$uri.'/index'
        ];

        return view('Pages/user/index', $Allowance);
    }
}

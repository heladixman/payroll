<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserAllowance;
use App\Models\UserDeduction;
use App\Models\UserBonus;
use App\Models\Attendance;

class IndexController extends BaseController
{
    public function __construct(){
        $this->userAllowance = new userAllowance();
        $this->userBonus = new userBonus();
        $this->userDeduction = new userDeduction();
        $this->attendance = new Attendance();
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
            'attendance'    => $this->attendance->where('user_id', $userId)->findAll(),
            'allowance'     => $this->userAllowance->select('allowances.name as allowance_name, user_allowances.id as id, type, effective_date, amount')->join('allowances', 'user_allowances.allowance_id = allowances.id')->where('user_id', $userId)->findAll(),
            'deduction'     => $this->userDeduction->select('deductions.name as deduction_name, user_deductions.id as id, type, effective_date, amount')->join('deductions', 'user_deductions.deduction_id = deductions.id')->where('user_id', $userId)->findAll(),
            'bonus'         => $this->userBonus->where('user_id', $userId)->findAll(),
            'content'       => 'Pages/user/'.$uri.'/index'
        ];

        return view('Pages/user/index', $Allowance);
    }
}

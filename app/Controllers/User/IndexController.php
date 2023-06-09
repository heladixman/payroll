<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserAllowance;
use App\Models\UserDeduction;
use App\Models\UserBonus;
use App\Models\Attendance;
use App\Models\Positions;
use App\Models\UserModel;

class IndexController extends BaseController
{
    public function __construct(){
        $this->userAllowance = new userAllowance();
        $this->userBonus = new userBonus();
        $this->userDeduction = new userDeduction();
        $this->attendance = new Attendance();
        $this->position = new Positions();
    }
    public function indexUser()
    {
        $base_url   = base_url();
        $uri        = 'home';
        $userId     = null;
        $userName   = null;
        $userPosition = null;
        $userPhone  = null;
        $userAddress= null;
        $userSex    = null;
        $userEmail  = null;
        $userRole   = null;
        $userNumber   = null;

        if(user()){
            $userId = user()->id;
            $userPosition = $this->position->where('id', user()->position_id)->findAll()[0];
            $userName   = user()->name;
            $userPhone  = user()->phone_number;
            $userAddress= user()->user_address;
            $userSex    = user()->sex;
            $userEmail  = user()->email;
            $userRole   = user()->user_role;
            $userNumber   = user()->user_number;
        }
        // var_dump($this->user->where('id', $userId)->findAll);
        // var_dump(user());
        // var_dump(user()->name);
        // die;
        
        $User = [
            'title'         => $uri,
            'attendance'    => $this->attendance->where('user_id', $userId)->findAll(),
            'allowance'     => $this->userAllowance->select('allowances.name as allowance_name, user_allowances.id as id, type, effective_date, amount')->join('allowances', 'user_allowances.allowance_id = allowances.id')->where('user_id', $userId)->findAll(),
            'deduction'     => $this->userDeduction->select('deductions.name as deduction_name, user_deductions.id as id, type, effective_date, amount')->join('deductions', 'user_deductions.deduction_id = deductions.id')->where('user_id', $userId)->findAll(),
            'bonus'         => $this->userBonus->where('user_id', $userId)->findAll(),
            'user_name'     => $userName,
            'user_position' => $userPosition,
            'user_id'       => $userNumber,
            'user_phone'    => $userPhone,
            'user_address'  => $userAddress,
            'user_sex'      => $userSex,
            'user_email'    => $userEmail,
            'user_role'     => $userRole,
            'content'       => 'Pages/user/'.$uri.'/index',
        ];

        return view('Pages/user/index', $User);
    }
}

<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserAllowance;
use App\Models\UserDeduction;
use App\Models\UserBonus;
use App\Models\Attendance;
use App\Models\PayrollDetails;
use App\Models\Users;

class IndexController extends BaseController
{
    public function __construct(){
        $this->userAllowance    = new userAllowance();
        $this->userBonus        = new userBonus();
        $this->userDeduction    = new userDeduction();
        $this->attendance       = new Attendance();
        $this->payrolldetails   = new PayrollDetails();
        $this->users            = new Users();
    }

    public function index()
    {
        $uri                    = 'home';

        $Homepage = [
            'title'             => $uri,
            'appName'           => $this->getAppName(),
            'content'           => 'Pages/user/'.$uri.'/index'
        ];

        return view('Pages/user/index', $Homepage);
    }

    public function profileUser()
    {
        $base_url               = base_url();
        $uri                    = 'account';
        $userId                 = null;

        if(user()){
            $userId = user()->id;
        }
        
        $Profile = [
            'title'             => $uri,
            'attendance'        => $this->attendance->select('attendances.id as id, users.user_number as user_number, users.name as user_name, user_id, log_type, datetime_log')->join('users', 'attendances.user_id = users.id')->where('user_id', $userId)->findAll(),
            'allowance'         => $this->userAllowance->select('allowances.name as allowance_name, user_allowances.id as id, type, effective_date, amount')->join('allowances', 'user_allowances.allowance_id = allowances.id')->where('user_id', $userId)->findAll(),
            'deduction'         => $this->userDeduction->select('deductions.name as deduction_name, user_deductions.id as id, type, effective_date, amount')->join('deductions', 'user_deductions.deduction_id = deductions.id')->where('user_id', $userId)->findAll(),
            'bonus'             => $this->userBonus->select('bonus.name as bonus_name, effective_date, amount')->join('bonus', 'user_bonus.bonus_id = bonus.id')->where('user_id', $userId)->findAll(),
            'payslip'           => $this->payrolldetails->select('payrolls.reff_no as reff_no, payroll_details.createAt as dateCreate, payroll_details.id as id, net_salary')->join('payrolls', 'payroll_details.payroll_id = payrolls.id')->where('user_id', $userId)->findAll(),
            'content'           => 'Pages/user/'.$uri.'/index'
        ];

        return view('Pages/user/index', $Profile);
    }

    public function insertAttendance(){
        $userNumber             = $this->request->getPost('userNumber');
        $attendType             = $this->request->getPost('attendanceType');
        $todayDate              = date("Y-m-d");
        $user                   = $this->users->select('id')->where('user_number', $userNumber)->first();
        
        // Check if it's not user
        if(!$user){
            session()->setFlashData('error', 'Invalid User Number');
            return redirect()->to(base_url().'');
        }

        // Check if already insert the data by type
        $attCheck               = $this->attendance->where('user_id', $user['id'])->where('log_type', $attendType)->where('DATE(datetime_log)', $todayDate)->countAllResults();
        var_dump($attCheck);

        if($attCheck > 0){
            session()->setFlashData('message', 'Data Already Recorded');
            return redirect()->to(base_url().'');
        }

        $data = [
            'user_id'           => $user['id'],
            'log_type'          => $attendType,
        ];

        $this->attendance->attInsert($data);
        session()->setFlashData('message', 'Data Successfully Inserted');
        return redirect()->to(base_url().'');
    }
}

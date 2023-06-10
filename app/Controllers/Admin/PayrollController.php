<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Payroll;
use App\Models\PayrollDetails;
use App\Models\Users;
use App\Models\Attendance;
use App\Models\UserDeduction;
use App\Models\UserAllowance;
use App\Models\UserBonus;
use CodeIgniter\Database\RawSql;

class PayrollController extends BaseController
{
    public function __construct(){
        $this->payroll = new Payroll();
        $this->payrolldetail = new PayrollDetails();
        $this->users = new Users();
        $this->attendance = new Attendance();
        $this->userdeduction = new UserDeduction();
        $this->userallowance = new UserAllowance();
        $this->userbonus = new UserBonus();
        $this->db = db_connect();
    }

    public function indexPayroll()
    {
        $uri            = 'payroll';

        $Dashboard = [
            'title'         => $uri,
            'payroll'       => $this->payroll->findAll(),
            'listPayment'   => $this->payroll->listPayment()->getResult(),
            'content'       => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Dashboard);
    }

    public function insertPayroll(){
        $id = $this->request->getPost('idPayroll');

        if(empty($id)){
            $i = 1;
            while($i == 1) {
                $reff_no = date('Y')."-".mt_rand(1,99999);
                $reff_check = $this->payroll->select('*')->where('reff_no', $reff_no)->countAllResults();
                if($reff_check <= 0){
                    $i = 0;
                }
            }
        }

        $data = array(
            'reff_no'           => $reff_no,
            'date_from'         => $this->request->getPost('payrollDateFrom'),
            'date_to'           => $this->request->getPost('payrollDateTo'),
            'payment_method_id' => $this->request->getPost('payrollPaymentMethod'),
            'comment'           => $this->request->getPost('payrollComment'),
            'status'            => 'Pending',
        );

        $this->payroll->insertPayroll($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'payroll');
    }

    public function calculatePayroll($id, $dateFrom, $dateTo){
        $payroll        = $this->payroll->select('*')->where('id', $id)->get();
        $users          = $this->users->select('users.id, salaries.amount as user_salary')->join('salaries', 'users.position_id = salaries.position_id','left')->get();
        $dayStart       = date_create($dateFrom);
        $dayEnd         = date_create($dateTo);
        $interval       = date_diff($dayStart, $dayEnd);
        $totalDays      = $interval->days +1;

        $sundayCount    = 0;
        for($i = 0; $i <$totalDays; $i++){
            $currentDay = date_create($dateFrom)->modify("+$i day");
            $dayOfWeek  = $currentDay->format('N');
            if($dayOfWeek == 7){
                $sundayCount++;
            }
        }

        $totalDaysWork  = $totalDays - $sundayCount;

        $attend = $this->attendance->select('*')->where("DATE(datetime_log) BETWEEN '{$dateFrom}' AND '{$dateTo}' ")->orderBy('UNIX_TIMESTAMP(datetime_log)', 'asc')->get();

        $isAttend = 1;
        while($isAttend){
            // while($row = $attend->getResultArray()){
            $row = $attend->getResultArray();
            foreach($row as $r){
                $date = date("Y-m-d", strtotime($r['datetime_log']));
                if($r['log_type'] == 1){
                    if(!isset($atten[$r['user_id'] . "_" . $date]['log'][$r['log_type']])){
                        $atten[$r['user_id'] . "_" . $date]['log'][$r['log_type']] = $r['datetime_log'];
                    }
                } else {
                    $atten[$r['user_id'] . "_" . $date]['log'][$r['log_type']] = $r['datetime_log'];
                }   
            }
            $isAttend = 0;
        }

        // $deduction = $this->userdeduction->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('type = 1 AND DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();

        // Ini ada salah syntax
        // $sqlDeduction = "SELECT * FROM user_deductions LEFT JOIN payrolls on payrolls.id = $id WHERE user_deductions.type = 1 AND DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to";
        // $db      = \Config\Database::connect();
        // $builder = $db->table('user_deductions');
        // $deduction = $builder->select(new RawSql($sqlDeduction))->get();
        
        // $deduction = $this->userdeduction->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('type = 1 AND DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();
        $deduction = $this->db->select('*')->from('user_deductions')->join('payrolls', 'payrolls.id = '. $id)->where('user_deductions.type = 1 AND DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();

        // $deduction = $this->userdeduction->select('*')->where('type', 1)->orWhere(function ($builder) use ($payroll) {
        //     $builder->where("DATE(effective_date) BETWEEN '" . $payroll['date_from'] . "' AND '" . $payroll['date_to'] . "'");
        // })->get();
        var_dump($deduction);
        var_dump('hello world');
        exit;

        $allowance = $this->userallowance->select('*')->where('type', 1)->orWhere(function ($builder) use ($payroll) {
            $builder->where("DATE(effective_date) BETWEEN '" . $payroll['date_from'] . "' AND '" . $payroll['date_to'] . "'");
        })->get();

        $bonus = $this->userbonus->select('*')->where(function ($builder) use ($payroll) {
            $builder->where("DATE(effective_date) BETWEEN '" . $payroll['date_from'] . "' AND '" . $payroll['date_to'] . "'");
        })->get();


        
        $ded = array();
        while($row = $deduction->getRow()){
            $ded[$row['user_id']][] = array('did' => $row['deduction_id'], 'amount' => $row['amount']);
        }

        $allow = array();
        while($row = $allowance->getRow()){
            $allow[$row['user_id']][] = array('aid' => $row['allowance_id'], 'amount' => $row['amount']);
        }

        $bon = array();
        while($row = $bonus->getRow()){
            $bon[$row['user_id']][] = array('bid' => $row['bonus_id'], 'amount' => $row['amount']);
        }

        $data = array();
        while($row = $users->getRow()){
            $salary         = $row->user_salary;
            $daily_salary   = $salary / $totalDaysWork;
            $present        = 0;
            $absent         = 0;
            $leave          = 0;
            $allow_amount   = 0;
            $ded_amount     = 0;
            $bon_amount     = 0;
            $pph            = 0;
            $net            = 0;
            $allow_arr      = array();
            $deduc_arr      = array();
            $bonus_arr      = array();

            if(isset($allow[$row['id']])){
                foreach($allow[$row['id']] as $arow){
                    $allow_arr[] = $arow;
                    $allow_amount += $arow['amount'];
                }
            }

            if(isset($ded[$row['id']])){
                foreach($ded[$row['id']] as $drow){
                    $deduc_arr[] = $drow;
                    $ded_amount += $drow['amount'];
                }
            }

            if(isset($bon[$row['id']])){
                foreach($bon[$row['id']] as $brow){
                    $bonus_arr[] = $brow;
                    $bon_amount += $brow['amount'];
                };
            }
            
            $data[] = array(
                "payroll_id"            => $payroll['id'],
                "user_id"               => $row->id,
                "total_working_days"    => $totalDaysWork,
                "present"               => $present,
                "absent"                => $absent,
                "leave"                 => $leave,
                "gross_salary"          => $salary,
                "allowances"            => json_encode($allow_arr),
                "allowance_total"       => $allow_amount,
                "deductions"            => json_encode($deduc_arr),
                "deduction_total"       => $ded_amount,
                "bonus"                 => json_encode($bonus_arr),
                "bonus_total"           => $bon_amount,
                "pph"                   => $pph,
                "net_salary"            => $net
            );
        }

        foreach ($data as $row) {
            $this->payrolldetail->insertPayrollDetail($row);
        }
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'payroll');
    }

    public function deletePayroll(){
        $id   = $this->request->getPost('salaryId');

        $this->payroll->deletePayroll($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'payroll');
    }
    
}

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
            'payroll' => $this->payroll->findAll(),
            'listPayment'   => $this->payroll->listPayment()->getResult(),
            'content'       => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Dashboard);
    }

    public function indexPayrollDetail($id)
    {
        $uri                = 'payroll';
        $title              = 'Payroll Details';

        $Dashboard = [
            'title'               => $title,
            'payrolldetail'       => $this->payrolldetail->where('payroll_id', $id)->findAll(),
            'listPayment'   => $this->payroll->listPayment()->getResult(),
            'content'       => 'Pages/admin/'.$uri.'/detail'
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
        $users          = $this->users->select('users.id, salaries.amount as user_salary, users.name')->join('salaries', 'users.position_id = salaries.position_id','left')->get();
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

        // $deduction = $this->userdeduction->select('*')->where('type', 1)->get();

        $deduction = $this->userdeduction->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('type = 1 OR DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();

        $allowance = $this->userallowance->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('type = 1 OR DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();
        
        $bonus = $this->userbonus->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();

        $isDedyction = 1;
        while($isDedyction){
            $row = $deduction->getResultArray();
            foreach ($row as $r) {
                $ded[$r['user_id']][] = array('did' => $r['deduction_id'], 'amount' => $r['amount']);
            }
            $isDedyction = 0;
        }

        $isAllowance = 1;
        while($isAllowance){
            $row = $allowance->getResultArray();
            foreach($row as $r){
                $allow[$r['user_id']][] = array('aid' => $r['allowance_id'], 'amount' => $r['amount']);
            }
            $isAllowance = 0;
        }

        $isBon = 1;
        while($isBon){
            $row = $bonus->getResultArray();
            foreach($row as $r){
                $bon[$r['user_id']][] = array('bid' => $r['bonus_id'], 'amount' => $r['amount']);
            }
            $isBon = 0;
        }

        $isData = 1;
        while($isData){
            $row = $users->getResultArray();
            // var_dump($row);
            foreach($row as $r){
                $att            = $this->attendance->select('*')->join('payrolls', 'payrolls.id = '. $id, 'left')->where('log_type = 1 AND DATE(datetime_log) BETWEEN payrolls.date_from AND payrolls.date_to AND user_id = '. $r['id']);
                $salary         = $r['user_salary'];
                $daily_salary   = $salary / $totalDaysWork;
                $present        = $att->countAll();
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

                if(isset($allow[$r['id']])){
                    foreach($allow[$r['id']] as $arow){
                        $allow_arr[] = $arow;
                        $allow_amount += $arow['amount'];
                    }
                }

                if(isset($ded[$r['id']])){
                    foreach($ded[$r['id']] as $drow){
                        $deduc_arr[] = $drow;
                        $ded_amount += $drow['amount'];
                    }
                }

                if(isset($bon[$r['id']])){
                    foreach($bon[$r['id']] as $brow){
                        $bonus_arr[] = $brow;
                        $bon_amount += $brow['amount'];
                    };
                }
                
                $idPayroll = $payroll->getResultArray();
                // var_dump($idPayroll);
                $data[] = array(
                    "payroll_id"            => $idPayroll[0]['id'],
                    "user_id"               => $r['id'],
                    "total_working_days"    => $totalDaysWork,
                    "present"               => $present,
                    "absent"                => $absent,
                    "leave"                 => $leave,
                    "gross_salary"          => $salary,
                    "allowances"            => json_encode($allow_arr),
                    "allowance_total"       => $allow_amount,
                    "deductions"            => json_encode($deduc_arr),
                    "deduction_total"       => $ded_amount,
                    "bonuses"               => json_encode($bonus_arr),
                    "bonus_total"           => $bon_amount,
                    "pph"                   => $pph,
                    "net_salary"            => $net
                );

                
            }
            $isData = 0;
            
        }

        foreach ($data as $row) {
            // var_dump($row);
            $this->payrolldetail->insertPayrollDetail($row);
        }

        $this->payroll->insertStatus($id);

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

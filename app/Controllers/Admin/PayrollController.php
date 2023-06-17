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
use App\Models\Leave;
use App\Models\WebData;

class PayrollController extends BaseController
{
    public function __construct(){
        $this->payroll              = new Payroll();
        $this->payrolldetail        = new PayrollDetails();
        $this->users                = new Users();
        $this->attendance           = new Attendance();
        $this->userdeduction        = new UserDeduction();
        $this->userallowance        = new UserAllowance();
        $this->userbonus            = new UserBonus();
        $this->leave                = new Leave();
        $this->webdata              = new WebData();
    }

    public function indexPayroll()
    {
        $uri                        = 'payroll';

        $Dashboard = [
            'title'                 => $uri,
            'appName'               => $this->getAppName(),
            'payroll'               => $this->payroll->findAll(),
            'listPayment'           => $this->payroll->listPayment()->getResult(),
            'content'               => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Dashboard);
    }

    public function printPayroll($payroll_id, $id)
    {
        $uri                        = 'payslip';
        $payrolldetail              = $this->payrolldetail->select('users.name as user_name, payrolls.reff_no as reff_no, users.user_number as user_number, payroll_details.createAt as create_at, gross_salary, allowance_total, deduction_total, bonus_total, pph, net_salary')->join('users', 'payroll_details.user_id = users.id')->join('payrolls', 'payroll_details.payroll_id = payrolls.id')->where('payroll_details.id', $id)->findAll();
        $data                       = $payrolldetail[0];

        $Dashboard = [
            'title'                 => $uri,
            'data'                  => $data,
            'gross_salary'          => $data['gross_salary'] + $data['allowance_total'] + $data['bonus_total'] - $data['deduction_total'],
            'content'               => 'Pages/user/'.$uri.'/print'
            
        ];

        return view('Pages/user/index', $Dashboard);
    }

    public function indexPayrollDetail($id)
    {
        $uri                        = 'payroll';
        $title                      = 'Payroll Details';

        $Dashboard = [
            'title'                 => $title,
            'appName'               => $this->getAppName(),
            'payrolldetail'         => $this->payrolldetail->select('payrolls.reff_no as reff_no, payroll_details.createAt as dateCreate, payroll_details.id as id, net_salary, total_working_days, users.name as user_name, present, absent, leave, net_salary')->where('payroll_id', $id)->join('payrolls', 'payroll_details.payroll_id = payrolls.id')->join('users', 'payroll_details.user_id = users.id')->findAll(),
            'listPayment'           => $this->payroll->listPayment()->getResult(),
            'content'               => 'Pages/admin/'.$uri.'/detail'
        ];

        return view('Pages/admin/index', $Dashboard);
    }

    public function insertPayroll(){
        $id                         = $this->request->getPost('idPayroll');
        $getPayrollInisial          = $this->webdata->select('value')->where('name','PAYROLL_FIRST_INISIAL')->get();
        $payrollInisial             = $getPayrollInisial->getRow()->value;

        if(empty($id)){
            $i = 1;
            while($i == 1) {
                $reff_no = $payrollInisial. date('Ymd')."".mt_rand(1,99999);
                $reff_check = $this->payroll->select('*')->where('reff_no', $reff_no)->countAllResults();
                if($reff_check <= 0){
                    $i = 0;
                }
            }
        }

        $data = array(
            'reff_no'               => $reff_no,
            'date_from'             => $this->request->getPost('payrollDateFrom'),
            'date_to'               => $this->request->getPost('payrollDateTo'),
            'payment_method_id'     => $this->request->getPost('payrollPaymentMethod'),
            'comment'               => $this->request->getPost('payrollComment'),
            'status'                => 'Pending',
        );

        $this->payroll->insertPayroll($data);
        session()->setFlashData('message', 'Data Successfully Inserted');
        return redirect()->to(base_url().'payroll');
    }

    public function calculatePayroll(){
        $id                         = $this->request->getPost('calPayrollId');
        $dateFrom                   = $this->request->getPost('calPayrollDateFrom');
        $dateTo                     = $this->request->getPost('calPayrollDateTo');

        $payroll                    = $this->payroll->select('*')->where('id', $id)->get();
        $users                      = $this->users->select('users.id, salaries.amount as user_salary, users.name')->where('user_role', 'user')->join('salaries', 'users.position_id = salaries.position_id','left')->get();
        $dayStart                   = date_create($dateFrom);
        $dayEnd                     = date_create($dateTo);
        $interval                   = date_diff($dayStart, $dayEnd);
        $totalDays                  = $interval->days +1;

        $sundayCount = 0;
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

        $deduction                  = $this->userdeduction->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('type = 1 OR DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();
        $allowance                  = $this->userallowance->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('type = 1 OR DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();
        $bonus                      = $this->userbonus->select('*')->join('payrolls', 'payrolls.id = '. $id)->where('DATE(effective_date) BETWEEN payrolls.date_from AND payrolls.date_to')->get();

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
                $att                = $this->attendance->select('*')->join('payrolls', 'payrolls.id = '. $id, 'left')->where('log_type = 1 AND DATE(datetime_log) BETWEEN payrolls.date_from AND payrolls.date_to AND user_id = '. $r['id']);
                $svLeave            = $this->leave->selectSum('total_leave')->join('payrolls', 'payrolls.id =' .$id)->where('DATE(leave_start) BETWEEN payrolls.date_from AND payrolls.date_to AND user_id =' .$r['id'])->get();
                $salary             = (float) $r['user_salary'];
                $grossSalary        = 0;
                $present            = $att->countAllResults();
                $leave              = $svLeave->getRow()->total_leave ? $svLeave->getRow()->total_leave : '0';
                $absent             = $totalDaysWork - ($present + $leave);
                $allow_amount       = 0;
                $ded_amount         = 0;
                $bon_amount         = 0;
                $getPPH             = $this->webdata->select('value')->where('name','PPH')->get();
                $pphPercentage      = (int) $getPPH->getRow()->value;
                $pph                = 0;
                $net                = 0;
                $net_salary         = 0;
                $allow_arr          = array();
                $deduc_arr          = array();
                $bonus_arr          = array();

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

                $paysPerDay = $salary / $totalDaysWork;

                // set salary based on days present
                if($totalDaysWork == $present){
                    $grossSalary = $salary;
                } else {
                    $grossSalary = $paysPerDay * $present;
                }

                // // salary before pph
                $salaryNoPPH = $grossSalary + $allow_amount + $bon_amount - $ded_amount;
                $pphAmount = $salaryNoPPH * $pphPercentage / 100;
                $net_salary = $salaryNoPPH - $pphAmount;
                
                $idPayroll = $payroll->getResultArray();
                // var_dump($idPayroll);
                $data[] = array(
                    "payroll_id"            => $idPayroll[0]['id'],
                    "user_id"               => $r['id'],
                    "total_working_days"    => $totalDaysWork,
                    "present"               => $present,
                    "absent"                => $absent,
                    "leave"                 => $leave,
                    "gross_salary"          => $grossSalary,
                    "allowances"            => json_encode($allow_arr),
                    "allowance_total"       => $allow_amount,
                    "deductions"            => json_encode($deduc_arr),
                    "deduction_total"       => $ded_amount,
                    "bonuses"               => json_encode($bonus_arr),
                    "bonus_total"           => $bon_amount,
                    "pph"                   => $pphAmount,
                    "net_salary"            => $net_salary
                ); 
            }
            $isData = 0; 
        }

        foreach ($data as $row) {
            // var_dump($row);
            $this->payrolldetail->insertPayrollDetail($row);
        }

        $this->payroll->insertStatus($id);
        session()->setFlashData('message', 'Data Successfully Renewed');
        return redirect()->to(base_url().'payroll');
    }

    public function dataPayroll($id)
    {
        $result = $this->payroll->find($id);
        return json_encode($result);
    }

    public function updatePayroll(){
        $id   = $this->request->getPost('payrollId');

        $this->payroll->updatePayroll($id);
        session()->setFlashData('error', 'Data Successfully Deleted');
        return redirect()->to(base_url().'payroll');
    }

    public function deletePayroll(){
        $id   = $this->request->getPost('payrollId');

        $this->payroll->deletePayroll($id);
        session()->setFlashData('error', 'Data Successfully Deleted');
        return redirect()->to(base_url().'payroll');
    }

}

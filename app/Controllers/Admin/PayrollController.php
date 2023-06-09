<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Payroll;
use App\Models\Users;
use App\Models\Attendance;
use App\Models\UserDeduction;

class PayrollController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->payroll = new Payroll();
        $this->employee = new Users();
        $this->attendance = new Attendance();
        $this->userdeduction = new UserDeduction();
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
        $payroll   = $this->payroll->select('*')->where('id', $id);
        $employee  = $this->employee->findAll();
        $dayStart  = date_create($dateFrom);
        $dayEnd    = date_create($dateTo);
        $totalDaysWork  = date_diff($dayStart, $dayEnd)->days +1;

        $attend = $this->attendance->select('*')->where("DATE(datetime_log) BETWEEN '{$dateFrom}' AND '{$dateTo}' ")->order_by('UNIX_TIMESTAMP(datetime_log)', 'asc');

        while($row=$attend->row_array()){
            $date = date("Y-m-d",strtotime($row['datetime_log']));
            if($row['log_type']){
                if(!isset($attendance[$row['user_id']."_".$date]['log'][$row['log_type']])){
                    $attendance[$row['user_id']."_".$date]['log'][$row['log_type']] = $row['datetime_log'];
                }
            }
            else {
                $attendance[$row['user_id']."_".$date]['log'][$row['log_type']] = $row['datetime_log'];
            }
        }

        $deduction = $this->userdeduction->select('*');



        $this->payroll->updatePayroll($data, $id);
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

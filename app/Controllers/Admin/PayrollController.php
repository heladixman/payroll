<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Payroll;

class PayrollController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->payroll = new Payroll();
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
        $reff_no = date('Y')."-".mt_rand(1,99999);
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
        return redirect()->to(base_url().'settings');
    }
    public function updatePayroll(){
        $id   = $this->request->getPost('salaryId');
        $data = array(
            'position_id'   => $this->request->getPost('salaryPositionId'),
            'amount'        => $this->request->getPost('salaryAmount'),
            'annual'        => $this->request->getPost('salaryAnnual')
        );

        $this->payroll->updatePayroll($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deletePayroll(){
        $id   = $this->request->getPost('salaryId');

        $this->payroll->deletePayroll($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }
}

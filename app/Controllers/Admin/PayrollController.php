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

    public function insertSalary(){
        $data = array(
            'position_id'   => $this->request->getPost('salaryPositionId'),
            'amount'        => $this->request->getPost('salaryAmount'),
            'annual'        => $this->request->getPost('salaryAnnual')
        );

        $this->salary->insertSalary($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function updateSalary(){
        $id   = $this->request->getPost('salaryId');
        $data = array(
            'position_id'   => $this->request->getPost('salaryPositionId'),
            'amount'        => $this->request->getPost('salaryAmount'),
            'annual'        => $this->request->getPost('salaryAnnual')
        );

        $this->salary->updateSalary($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deleteSalary(){
        $id   = $this->request->getPost('salaryId');

        $this->salary->deleteSalary($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }
}

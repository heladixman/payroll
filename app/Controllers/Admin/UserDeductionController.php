<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserDeduction;

class UserDeductionController extends BaseController
{
    public function __construct(){
        $this->userDeduction    = new UserDeduction();
    }

    public function indexDeduction()
    {
        $base_url               = base_url();
        $uri                    = 'deduction';
        $parent                 = 'employee';
        
        $Deduction = [
            'title'             => $uri,
            'appName'           => $this->getAppName(),
            'parent'            => ['name' => $parent, 'url' => $base_url.$parent],
            'listuser'          => $this->userDeduction->listUser()->getResult(),
            'listdeduction'     => $this->userDeduction->listDeduction()->getResult(),
            'deduction'         => $this->userDeduction->select('user_deductions.id as id, users.name as user_name, deductions.name as deduction_name, amount, type, effective_date')->join('users', 'user_deductions.user_id = users.id')->join('deductions', 'user_deductions.deduction_id = deductions.id')->findAll(),
            'content'           => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Deduction);
    }

    public function insertDeduction(){
        $date = $this->request->getPost('deductionDate');
        if ($date == "null") {
            $date = "0000-00-00";
        }

        $data = array(
            'user_id'           => $this->request->getPost('deductionUser'),
            'deduction_id'      => $this->request->getPost('deductionDid'),
            'type'              => $this->request->getPost('deductionType'),
            'effective_date'    => $date,
            'amount'            => $this->request->getPost('deductionAmount')
        );

        $this->userDeduction->insertDeduction($data);
        session()->setFlashData('message', 'Data Successfully Inserted');
        return redirect()->to(base_url().'employee/deduction');
    }
    public function updateDeduction(){
        $id = $this->request->getPost('deductionId');
        $data = array(
            'user_id'           => $this->request->getPost('deductionUser'),
            'deduction_id'      => $this->request->getPost('deductionDid'),
            'type'              => $this->request->getPost('deductionType'),
            'effective_date'    => $this->request->getPost('deductionDate'),
            'amount'            => $this->request->getPost('deductionAmount')
        );

        $this->userDeduction->updateDeduction($data, $id);
        session()->setFlashData('message', 'Data Successfully Renewed');
        return redirect()->to(base_url().'employee/deduction');
    }
    public function deleteDeduction(){
        $id = $this->request->getPost('deductionId');

        $this->userDeduction->deleteDeduction($id);
        session()->setFlashData('error', 'Data Successfully Deleted');
        return redirect()->to(base_url().'employee/deduction');
    }
}

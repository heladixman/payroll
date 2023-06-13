<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserAllowance;

class UserAllowanceController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->userAllowance = new userAllowance();
    }

    public function indexAllowance()
    {
        $base_url   = base_url();
        $uri        = 'allowance';
        $parent     = 'employee';
        
        $Attendance = [
            'title'         => $uri,
            'parent'        => ['name' => $parent, 'url' => $base_url.$parent],
            'listuser'      => $this->userAllowance->listUser()->getResult(),
            'listallowance' => $this->userAllowance->listAllowance()->getResult(),
            'allowance'     => $this->userAllowance->select('user_allowances.id as id, allowances.name as allowance_name, users.name as user_name, type, effective_date, amount')->join('users', 'user_allowances.user_id = users.id')->join('allowances', 'user_allowances.allowance_id = allowances.id')->findAll(),
            'content'       => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Attendance);
    }

    public function insertAllowance(){
        $date = $this->request->getPost('allowanceDate');
        if ($date == "null") {
            $date = "0000-00-00";
        }

        $data = array(
            'user_id'           => $this->request->getPost('allowanceUser'),
            'allowance_id'      => $this->request->getPost('allowanceAid'),
            'type'              => $this->request->getPost('allowanceType'),
            'effective_date'    => $date,
            'amount'            => $this->request->getPost('allowanceAmount')
        );

        $this->userAllowance->insertAllowance($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'employee/allowance');
    }
    public function updateAllowance(){
        $id = $this->request->getPost('allowanceId');
        $data = array(
            'user_id'           => $this->request->getPost('allowanceUser'),
            'allowance_id'      => $this->request->getPost('allowanceAid'),
            'type'              => $this->request->getPost('allowanceType'),
            'effective_date'    => $this->request->getPost('allowanceDate'),
            'amount'            => $this->request->getPost('allowanceAmount')
        );

        $this->userAllowance->updateAllowance($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'employee/allowance');
    }
    public function deleteAllowance(){
        $id = $this->request->getPost('allowanceId');

        $this->userAllowance->deleteAllowance($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'employee/allowance');
    }
}

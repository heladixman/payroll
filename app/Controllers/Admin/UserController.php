<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Password;
use App\Models\Users;
use App\Models\UserAllowance;
use App\Models\UserBonus;
use App\Models\UserDeduction;
use App\Models\WebData;

class UserController extends BaseController
{
    public function __construct(){
        $this->list             = new Users;
        $this->userallowance    = new UserAllowance();
        $this->userbonus        = new UserBonus();
        $this->userdeduction    = new UserDeduction();
        $this->webData          = new WebData;
    }
    public function indexUser()
    {
        $base_url               = base_url();
        $uri                    = 'list';
        $parent                 = 'employee';
        
        $User = [
            'title'             => $uri,
            'appName'           => $this->getAppName(),
            'parent'            => ['name' => $parent, 'url' => $base_url.$parent],
            'listposition'      => $this->list->listPosition()->getResult(),
            'phoneCode'         => $this->webData->select('value')->where('name', 'USER_FIRST_PHONE_NUMBER')->get()->getRow()->value,
            'user'              => $this->list->findAll(),
            'content'           => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $User);
    }

    public function insertUser(){
        $phoneCode              = $this->webData->select('value')->where('name', 'USER_FIRST_PHONE_NUMBER');
        $password               = $this->request->getPost('userPassword');
        $password_hash          = Password::hash($password);

        $data = array(
            'username'          => $this->request->getPost('userName'),
            'email'             => $this->request->getPost('userEmail'),
            'password_hash'     => $password_hash,
            'active'            => $this->request->getPost('userStatus'),
            'user_role'         => $this->request->getPost('userRole'),
            'user_number'       => $this->request->getPost('userNumber'),
            'name'              => $this->request->getPost('userNames'),
            'phone_number'      => $this->request->getPost('userPhoneNumber'),
            'sex'               => $this->request->getPost('userGender'),
            'position_id'       => $this->request->getPost('userPosition'),
            'user_address'      => $this->request->getPost('userAddress'),
        );

        $this->list->insertUser($data);
        session()->setFlashData('message', 'Data Successfully Inserted');
        return redirect()->to(base_url().'employee');
    }
    public function dataUser($id){
        $user                   = $this->list->select('users.id as id, users.name as user_name, positions.name as position_name, email, position_id, sex, phone_number,user_number, user_address, user_role, username, active')->where('users.id', $id)->join('positions', 'users.position_id = positions.id')->find();
        $allowance              = $this->userallowance->select('user_id, allowance_id, type, effective_date, type')->where('user_id', $id)->join('allowances', 'user_allowances.allowance_id = allowances.id')->find();
        $bonus                  = $this->userbonus->select('user_id, bonus_id, effective_date, amount')->where('user_id', $id)->join('bonus', 'user_bonus.bonus_id = bonus.id')->find();
        $deduction              = $this->userdeduction->select('user_id, deduction_id, type, effective_date, type')->where('user_id', $id)->join('deductions', 'user_deductions.deduction_id = deductions.id')->find();

        $data = array(
            'user'              => $user[0],
            'allowance'         => $allowance,
            'bonus'             => $bonus,
            'deduction'         => $deduction,

        );

        return json_encode($data);
    }

    public function updateUser(){
        $id = $this->request->getPost('userId');
        
        $data = array(
            'active'            => $this->request->getPost('userStatus'),
            'user_role'         => $this->request->getPost('userRole'),
            'name'              => $this->request->getPost('userNames'),
            'phone_number'      => $this->request->getPost('userPhoneNumber'),
            'sex'               => $this->request->getPost('userGender'),
            'position_id'       => $this->request->getPost('userPosition'),
            'user_address'      => $this->request->getPost('userAddress'),
        );

        $this->list->updateUser($data, $id);
        session()->setFlashData('message', 'Data Successfully Renewed');
        return redirect()->to(base_url().'employee');
    }

    public function deleteUser(){
        $id = $this->request->getPost('userId');

        $this->list->deleteUser($id);
        session()->setFlashData('error', 'Data Successfully Deleted');
        return redirect()->to(base_url().'employee');
    }
}

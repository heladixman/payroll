<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Password;
use App\Models\Users;

class UserController extends BaseController
{
    public function __construct(){
        $this->list = new Users;
    }
    public function indexUser()
    {
        $base_url   = base_url();
        $uri        = 'list';
        $parent     = 'employee';
        
        $User = [
            'title'         => $uri,
            'parent'        => ['name' => $parent, 'url' => $base_url.$parent],
            'listposition'   => $this->list->listPosition()->getResult(),
            'user'          => $this->list->findAll(),
            'content'       => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $User);
    }

    public function insertUser(){
        $password = $this->request->getPost('userPassword');
        $password_hash = Password::hash($password);

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
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'employee');
    }
    public function updateUser($id){
        $result = $this->list->select('users.name as user_name, positions.name as position_name, email, position_id, sex, phone_number,user_number, user_address, user_role, username, active')->where('users.id', $id)->join('positions', 'users.position_id = positions.id')->find();
        return json_encode($result[0]);

        // $id = $this->request->getPost('userId');
        // $data = array(
        //     'user_id'           => $this->request->getPost('userUser'),
        //     'user_id'           => $this->request->getPost('userAid'),
        //     'type'              => $this->request->getPost('userType'),
        //     'effective_date'    => $this->request->getPost('userDate'),
        //     'amount'            => $this->request->getPost('userAmount')
        // );

        // $this->list->updateUser($data, $id);
        // session()->setFlashData('message', 'Data berhasil diperbarui');
        // return redirect()->to(base_url().'employee');
    }
    public function deleteUser(){
        $id = $this->request->getPost('userId');

        $this->list->deleteUser($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'employee');
    }

    public function getUserbyId(){
        // $id = $this->request->getPost('userId');
        $currentURL = $_SERVER['REQUEST_URI'];
    
    // Check the data in the URL
    if (strpos($currentURL, 'admin/user/ajax1') !== false) {
        // URL contains 'admin/user/ajax1'
        // Perform desired actions
    }

    return 'hello';
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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
        $data = array(
            'user_id'           => $this->request->getPost('userUser'),
            'user_id'      => $this->request->getPost('userAid'),
            'type'              => $this->request->getPost('userType'),
            'effective_date'    => $date,
            'amount'            => $this->request->getPost('userAmount')
        );

        $this->useruser->insertUser($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'employee/user');
    }
    public function updateUser(){
        $id = $this->request->getPost('userId');
        $data = array(
            'user_id'           => $this->request->getPost('userUser'),
            'user_id'      => $this->request->getPost('userAid'),
            'type'              => $this->request->getPost('userType'),
            'effective_date'    => $this->request->getPost('userDate'),
            'amount'            => $this->request->getPost('userAmount')
        );

        $this->useruser->updateUser($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'employee/user');
    }
    public function deleteUser(){
        $id = $this->request->getPost('userId');

        $this->useruser->deleteUser($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'employee/user');
    }
}

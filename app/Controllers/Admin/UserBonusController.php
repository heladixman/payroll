<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserBonus;

class UserBonusController extends BaseController
{
    public function __construct(){
        helper('form');
        $this->userBonus = new UserBonus();
    }

    public function indexBonus()
    {
        $base_url   = base_url();
        $uri        = 'bonus';
        $parent     = 'employee';
        
        $Bonus = [
            'title'         => $uri,
            'parent'        => ['name' => $parent, 'url' => $base_url.$parent],
            'listuser'      => $this->userBonus->listUser()->getResult(),
            'listbonus'     => $this->userBonus->listBonus()->getResult(),
            'bonus'         => $this->userBonus->select('user_bonus.id as id, users.name as user_name, bonus.name as bonus_name, effective_date, amount')->join('users', 'user_bonus.user_id = users.id')->join('bonus', 'user_bonus.bonus_id = bonus.id')->findAll(),
            'content'       => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Bonus);
    }

    public function insertBonus(){
        $data = array(
            'user_id'       => $this->request->getPost('bonusUser'),
            'bonus_id'      => $this->request->getPost('bonusBid'),
            'effective_date'=> $this->request->getPost('bonusDate'),
            'amount'        => $this->request->getPost('bonusAmount')
        );

        $this->userBonus->insertBonus($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'employee/bonus');
    }
    public function updateBonus(){
        $id = $this->request->getPost('bonusId');
        $data = array(
            'user_id'       => $this->request->getPost('bonusUser'),
            'bonus_id'      => $this->request->getPost('bonusBid'),
            'effective_date'=> $this->request->getPost('bonusDate'),
            'amount'        => $this->request->getPost('bonusAmount')
        );

        $this->userBonus->updateBonus($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'employee/bonus');
    }
    public function deleteBonus(){
        $id = $this->request->getPost('bonusId');

        $this->userBonus->deleteBonus($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'employee/bonus');
    }
}

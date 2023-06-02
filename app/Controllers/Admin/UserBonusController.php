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
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'attendance'=> $this->userBonus->select('user_bonus.id as id, users.name as user_name, bonus.name as bonus_name, effective_date, amount')->join('users', 'user_bonus.user_id = users.id')->join('bonus', 'user_bonus.bonus_id = bonus.id')->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Bonus);
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Positions;
use App\Models\Departement;

class PositionController extends BaseController
{
    public function __construct(){
        $this->position = new Positions();
    }
    public function index()
    {
        $base_url   = base_url();
        $uri        = 'position';
        $parent     = 'settings';
        
        $Position = [
            'title'     => $uri,
            'parent'    => ['name' => $parent, 'url' => $base_url.$parent],
            'data'      => $this->position->select('positions.name as position_name, departments.name as department_name, description, salary_start, salary_end, positions.id as id')->join('departments', 'positions.department_id = departments.id')->findAll(),
            'content'   => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Position);
    }
}

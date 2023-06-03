<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDeduction extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_deductions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function listUser(){
        return $this->db->table('users')->where('user_role', 'user')->get();
    }

    public function listDeduction(){
        return $this->db->table('deductions')->get();
    }

    public function insertDeduction($data){
        $this->db->table('user_deductions')->insert($data);
    }

    public function updateDeduction($data, $id){
        $this->db->table('user_deductions')->update($data, array('id' => $id));
    }

    public function deleteDeduction($id){
        $this->db->table('user_deductions')->delete(array('id' => $id));
    }
}

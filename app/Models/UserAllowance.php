<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAllowance extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_allowances';
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

    public function listAllowance(){
        return $this->db->table('allowances')->get();
    }

    public function insertAllowance($data){
        $this->db->table('user_allowances')->insert($data);
    }

    public function updateAllowance($data, $id){
        $this->db->table('user_allowances')->update($data, array('id' => $id));
    }

    public function deleteAllowance($id){
        $this->db->table('user_allowances')->delete(array('id' => $id));
    }
}

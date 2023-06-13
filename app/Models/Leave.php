<?php

namespace App\Models;

use CodeIgniter\Model;

class Leave extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'leave';
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

    public function insertLeave($data){
        $this->db->table('leave')->insert($data);
    }

    public function approveLeave($id){
        $this->db->table('leave')->update(array('status'=> 'Approve'), array('id' => $id));
    }

    public function declineLeave($id, $data){
        $this->db->table('leave')->update($data, array('id' => $id));
    }
}

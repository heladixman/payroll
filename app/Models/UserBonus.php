<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBonus extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_bonus';
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

    public function listBonus(){
        return $this->db->table('bonus')->get();
    }

    public function insertBonus($data){
        $this->db->table('user_bonus')->insert($data);
    }

    public function updateBonus($data, $id){
        $this->db->table('user_bonus')->update($data, array('id' => $id));
    }

    public function deleteBonus($id){
        $this->db->table('user_bonus')->delete(array('id' => $id));
    }
}

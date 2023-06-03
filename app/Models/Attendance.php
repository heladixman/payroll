<?php

namespace App\Models;

use CodeIgniter\Model;

class Attendance extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'attendances';
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

    public function insertAttendance($data){
        $this->db->table('attendances')->insert($data);
    }

    public function updateAttendance($data, $id){
        $this->db->table('attendances')->update($data, array('id' => $id));
    }

    public function deleteAttendance($id){
        $this->db->table('attendances')->delete(array('id' => $id));
    }
}

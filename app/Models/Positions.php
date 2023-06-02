<?php

namespace App\Models;

use CodeIgniter\Model;

class Positions extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'positions';
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

    public function listDepartment(){
        return $this->db->table('departments')->get();
    }

    public function insertPosition($data){
        $this->db->table('positions')->insert($data);
    }

    public function updatePosition($data, $id){
        $this->db->table('positions')->update($data, array('id' => $id));
    }

    public function deletePosition($id){
        $this->db->table('positions')->delete(array('id' => $id));
    }
}

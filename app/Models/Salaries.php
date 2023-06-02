<?php

namespace App\Models;

use CodeIgniter\Model;

class Salaries extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'salaries';
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

    public function listPosition(){
        return $this->db->table('positions')->get();
    }

    public function insertSalary($data){
        $this->db->table('salaries')->insert($data);
    }

    public function updateSalary($data, $id){
        $this->db->table('salaries')->update($data, array('id' => $id));
    }

    public function deleteSalary($id){
        $this->db->table('salaries')->delete(array('id' => $id));
    }
}

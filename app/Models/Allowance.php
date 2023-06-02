<?php

namespace App\Models;

use CodeIgniter\Model;

class Allowance extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'allowances';
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

    public function insertAllowance($data){
        $this->db->table('allowances')->insert($data);
    }

    public function updateAllowance($data, $id){
        $this->db->table('allowances')->update($data, array('id' => $id));
    }

    public function deleteAllowance($id){
        $this->db->table('allowances')->delete(array('id' => $id));
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Payroll extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'payrolls';
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

    public function listPayment(){
        return $this->db->table('payment_methods')->get();
    }

    public function insertPayroll($data){
        $this->db->table('payrolls')->insert($data);
    }

    public function insertStatus($id){
        $data = [
            'status' => 'Complete',
        ];
        $this->db->table('payrolls')->update($data, array('id' => $id));
    }

    public function updatePayroll($data, $id){
        $this->db->table('payrolls')->update($data, array('id' => $id));
    }

    public function deletePayroll($id){
        $this->db->table('payrolls')->delete(array('id' => $id));
    }
}

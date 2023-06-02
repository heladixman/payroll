<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentMethod extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'payment_methods';
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

    public function insertPaymentMethod($data){
        $this->db->table('payment_methods')->insert($data);
    }

    public function updatePaymentMethod($data, $id){
        $this->db->table('payment_methods')->update($data, array('id' => $id));
    }

    public function deletePaymentMethod($id){
        $this->db->table('payment_methods')->delete(array('id' => $id));
    }
}

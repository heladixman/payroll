<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payroll extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'reff_no' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'date_from' => [
                'type' => 'DATE',
            ],
            'date_to' => [
                'type' => 'DATE',
            ],
            'total' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'payment_method_id' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'comment' => [
                'type' => 'TEXT',
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('payment_method_id', 'payment_methods', 'id');
        $this->forge->createTable('payrolls', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('payrolls');
    }
}

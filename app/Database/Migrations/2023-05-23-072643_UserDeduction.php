<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDeduction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'deduction_id' => [
                'type' => 'INT',
            ],
            'type' => [
                'type' => 'BOOLEAN',
                'comment' => '0 = Monthly, 1 = Once'
            ],
            'effective_date' => [
                'type' => 'DATE',
            ],
            'amount' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('deduction_id', 'deductions', 'id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('user_deductions', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user_deductions');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Salary extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'position_id' => [
                'type' => 'INT',
            ],
            'amount' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'annual' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('position_id', 'positions', 'id');
        $this->forge->createTable('salaries', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('salaries');
    }
}

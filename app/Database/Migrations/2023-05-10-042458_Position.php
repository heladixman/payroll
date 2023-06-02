<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Positions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'department_id' => [
                'type' => 'INT',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'salary_start' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
                'null' => true
            ],
            'salary_end' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
                'null' => true
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('department_id', 'departments', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('positions', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('positions');
    }
}

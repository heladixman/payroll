<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
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
                'constraint' => 50,
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'vision' => [
                'type' => 'TEXT',
            ],
            'mission' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('departments', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('departments');
    }
}

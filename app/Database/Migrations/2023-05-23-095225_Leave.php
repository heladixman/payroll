<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Leave extends Migration
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
            'leave_start' => [
                'type' => 'DATE',
            ],
            'leave_end' => [
                'type' => 'DATE',
            ],
            'reason' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'prove' => [
                'type' => 'TEXT',
            ],
            'total_leave' => [
                'type' => 'INT',
                'default' => 1
            ],
            'comment' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('leave', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('leave');
    }
}

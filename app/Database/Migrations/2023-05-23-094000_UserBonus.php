<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserBonus extends Migration
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
            'bonus_id' => [
                'type' => 'INT',
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
        $this->forge->addForeignKey('bonus_id', 'bonus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_bonus', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user_bonus');
    }
}

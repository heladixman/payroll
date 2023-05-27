<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebData extends Migration
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
            'value' => [
                'type' => 'text',
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('webdatas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('webdatas');
    }
}

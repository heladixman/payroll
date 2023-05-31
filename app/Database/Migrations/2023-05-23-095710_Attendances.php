<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendances extends Migration
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
            'log_type' => [
                'type' => 'TINYINT',
                'comment' => '1= Morning In, 2= Morning Out, 3= Afternoon In, 4= Afternoon Out, 5= Overtime In, 6= Overtime Out',
            ],
            'datetime_log DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('attendances', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('attendances');
    }
}

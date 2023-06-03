<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PayrollDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'payroll_id' => [
                'type' => 'INT',
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'total_working_days' => [
                'type' => 'INT',
            ],
            'present' => [
                'type' => 'INT',
            ],
            'absent' => [
                'type' => 'INT',
            ],
            'leave' => [
                'type' => 'INT',
            ],
            'gross_salary' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'allowances' => [
                'type' => 'JSON',
            ],
            'allowance_total' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'deductions' => [
                'type' => 'JSON',
            ],
            'deduction_total' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'bonuses' => [
                'type' => 'JSON',
                'null' => true
            ],
            'bonus_total' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
                'default' => 0
            ],
            'pph' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'net_salary' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'createAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('payroll_id', 'payrolls', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('payroll_details', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('payroll_details');
    }
}

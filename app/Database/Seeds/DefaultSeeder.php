<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Password;

class DefaultSeeder extends Seeder
{
    public function run()
    {
        $allowances = [
            [
                'name'          => 'Transportasi',
                'description'   => 'Bantuan dana transportasi bulanan'
            ],
            [
                'name'          => 'Makan',
                'description'   => 'Bantuan dana makan bulanan'
            ],
        ];
        $this->db->table('allowances')->insertBatch($allowances);

        $bonus = [
            [
                'name'          => 'Penjualan',
                'description'   => 'Mencapai target penjualan perbulan'
            ],
            [
                'name'          => 'Kerajinan',
                'description'   => 'Bonus bulanan karena rajin bekerja'
            ],
        ];
        $this->db->table('bonus')->insertBatch($bonus);

        $deductions = [
            [
                'name'          => 'Pinjaman Karyawan',
                'description'   => 'Karyawan melakukan peminjaman gaji dengan memotong gaji'
            ],
            [
                'name'          => 'Denda Kehilangan',
                'description'   => 'Menghilangkan barang'
            ],
        ];
        $this->db->table('deductions')->insertBatch($deductions);

        $departments = [
            [
                'name'          => 'Default',
                'contact'       => '000-000-0000',
                'vision'        => 'Vision',
                'mission'       => 'Mission',
            ],
            [
                'name'          => 'IT',
                'contact'       => '021-887-6549',
                'vision'        => 'Visi Departement IT',
                'mission'       => 'Misi Department IT',
            ]
        ];
        $this->db->table('departments')->insertBatch($departments);

        $positions = [
            [
                'name'          => 'Admin',
                'department_id' => 1,
                'description'   => 'Controll',
                'salary_start'  => 0,
                'salary_end'    => 0
            ],
            [
                'name'          => 'IT Support',
                'department_id' => 2,
                'description'   => 'Description Position',
                'salary_start'  => 4000000,
                'salary_end'    => 5000000
            ],
            [
                'name'          => 'Web Developer',
                'department_id' => 2,
                'description'   => 'Description Position',
                'salary_start'  => 4500000,
                'salary_end'    => 5500000
            ],
        ];
        $this->db->table('positions')->insertBatch($positions);

        $PaymentMethod = [
            [
                'name'          => 'Cash',
                'number'        => '',
                'description'   => 'Tunai'
            ],
            [
                'name'          => 'BCA',
                'number'        => '8557343851',
                'description'   => 'Transfer Melalui BCA'
            ]
        ];
        $this->db->table('payment_methods')->insertBatch($PaymentMethod);

        $Salaries = [
            [
                'position_id'   => 2,
                'amount'        => 4000000,
                'annual'        => 48000000
            ],
            [
                'position_id'   => 3,
                'amount'        => 4500000,
                'annual'        => 54000000
            ],
        ];
        $this->db->table('salaries')->insertBatch($Salaries);

        $Webdata = [
            [
                'name'          => 'APP_NAME',
                'value'         => 'Payroll System'
            ],
            [
                'name'          => 'USER_FIRST_CODE_NUMBER',
                'value'         => 'PS'
            ],
            [
                'name'          => 'PPH',
                'value'         => 21
            ],
        ];
        $this->db->table('webdatas')->insertBatch($Webdata);

        $User = [
            [
                'position_id'   => 1,
                'user_number'   => '00000',
                'name'          => 'Admin',
                'phone_number'  => '00000000000',
                'user_address'  => 'No Address',
                'sex'           => 'Male',
                'email'         => 'admin@admin.com',
                'user_role'     => 'Admin',
                'username'      => 'admin',
                'password_hash' => Password::hash('admin123'),
                'active'        => 1
            ],
            [
                'position_id'   => 1,
                'user_number'   => 'PS0001',
                'name'          => 'User',
                'phone_number'  => '628',
                'user_address'  => 'Jl. Brigjend Katamso Kota Batam',
                'sex'           => 'Male',
                'email'         => 'user@user.com',
                'user_role'     => 'User',
                'username'      => 'user',
                'password_hash' => Password::hash('user123'),
                'active'        => 1
            ],
        ];
        $this->db->table('users')->insertBatch($User);
    }
}

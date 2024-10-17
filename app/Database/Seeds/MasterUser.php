<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterUser extends Seeder
{
    public function run()
    {
        $data = [
            'uuid' => '78e29200-55eb-4571-9133-4f8803a89532',
            'username'    => 'superadmin',
            'nama_lengkap' => 'Super Admin',
            'password' => password_hash('1q2w3e4r5t', PASSWORD_DEFAULT),
            'email' => 'superadmin@gmail.com',
            'uuid_program_studi' => '81b84279-716c-402b-818d-f3cae3f38e1b',
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('surat_m_user')->insert($data);
    }
}

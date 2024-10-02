<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramStudi extends Seeder
{
    public function run()
    {
        $data = [
            'uuid' => '81b84279-716c-402b-818d-f3cae3f38e1b',
            'kode_prodi'    => '-',
            'nama_prodi' => '-',
            'jenjang' => '-'
        ];

        // Using Query Builder
        $this->db->table('surat_r_program_studi')->insert($data);
    }
}

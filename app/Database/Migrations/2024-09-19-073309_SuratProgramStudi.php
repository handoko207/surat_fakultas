<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratProgramStudi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid' => ['type' => 'CHAR', 'constraint' => 36, 'unique' => true, 'null' => true],
            'kode_prodi' => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'nama_prodi' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jenjang' => ['type' => 'ENUM("D3","S1","S2","S3","PROFESI","SPESIALIS")', 'default' => 'S1'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('surat_r_program_studi');
    }

    public function down()
    {
        $this->forge->dropTable('surat_r_program_studi');
    }
}

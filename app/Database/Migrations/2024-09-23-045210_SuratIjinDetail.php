<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratIjinDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid_surat_ijin' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'nim' => ['type' => 'VARCHAR', 'constraint' => 18, 'null' => true],
            'nama_mahasiswa' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'uuid_program_studi' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('uuid_surat_ijin', 'surat_t_ijin', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('uuid_program_studi', 'surat_r_program_studi', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('surat_t_ijin_detail');
    }

    public function down()
    {
        $this->forge->dropTable('surat_t_ijin_detail');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratIjin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid' => ['type' => 'CHAR', 'constraint' => 36, 'unique' => true, 'null' => true],
            'uuid_user' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'no_surat_ijin' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jenis_surat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_dosen' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'mata_kuliah' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'uuid_program_studi' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'sebab' => ['type' => 'TEXT', 'null' => true],
            'nama_tempat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tanggal_awal' => ['type' => 'DATE', 'null' => true],
            'tanggal_akhir' => ['type' => 'DATE', 'null' => true],
            'tanggal_pengajuan' => ['type' => 'DATE', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'status_keterangan' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('uuid_user', 'surat_m_user', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('uuid_program_studi', 'surat_r_program_studi', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('surat_t_ijin');
    }

    public function down()
    {
        $this->forge->dropTable('surat_t_ijin');
    }
}

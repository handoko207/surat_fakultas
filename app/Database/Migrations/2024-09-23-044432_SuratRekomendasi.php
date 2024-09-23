<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratRekomendasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid' => ['type' => 'CHAR', 'constraint' => 36, 'unique' => true, 'null' => true],
            'uuid_user' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'no_surat_rekomendasi' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jenis_surat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_pejabat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nip_pejabat' => ['type' => 'VARCHAR', 'constraint' => 18, 'null' => true],
            'pangkat_pejabat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jabatan_pejabat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_mahasiswa' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nim' => ['type' => 'VARCHAR', 'constraint' => 18, 'null' => true],
            'uuid_program_studi' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'angkatan' => ['type' => 'INT', 'constraint' => 4, 'null' => true],
            'semester' => ['type' => 'INT', 'constraint' => 2, 'null' => true],
            'tahun_ajaran' => ['type' => 'VARCHAR', 'constraint' => 9, 'null' => true],
            'tanggal_pengajuan' => ['type' => 'DATE', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'status_keterangan' => ['type' => 'TEXT', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('uuid_user', 'surat_m_user', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('uuid_program_studi', 'surat_r_program_studi', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('surat_t_rekomendasi');
    }

    public function down()
    {
        $this->forge->dropTable('surat_t_rekomendasi');
    }
}

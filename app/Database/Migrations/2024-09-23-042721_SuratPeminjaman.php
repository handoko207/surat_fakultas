<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratPeminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid' => ['type' => 'CHAR', 'constraint' => 36, 'unique' => true, 'null' => true],
            'uuid_user' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'no_surat_peminjam' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jenis_surat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_organisasi' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_kegiatan' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_tempat' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_penanggung_jawab' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'kontak_penanggung_jawab' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tanggal_peminjaman' => ['type' => 'DATE', 'null' => true],
            'tanggal_awal' => ['type' => 'DATETIME', 'null' => true],
            'tanggal_akhir' => ['type' => 'DATETIME', 'null' => true],
            'nama_hima' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_ketua_hima' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nim_ketua_hima' => ['type' => 'VARCHAR', 'constraint' => 18, 'null' => true],
            'nama_ketua_pelaksana' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nim_ketua_pelaksana' => ['type' => 'VARCHAR', 'constraint' => 18, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'status_keterangan' => ['type' => 'TEXT', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('uuid_user', 'surat_m_user', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('surat_t_peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('surat_t_peminjaman');
    }
}

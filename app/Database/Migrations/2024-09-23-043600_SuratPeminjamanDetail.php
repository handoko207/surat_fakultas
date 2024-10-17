<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratPeminjamanDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid_surat_peminjaman' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'nama_barang' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jumlah' => ['type' => 'INT', 'constraint' => 5, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('uuid_surat_peminjaman', 'surat_t_peminjaman', 'uuid', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('surat_t_peminjaman_detail');
    }

    public function down()
    {
        $this->forge->dropTable('surat_t_peminjaman_detail');
    }
}

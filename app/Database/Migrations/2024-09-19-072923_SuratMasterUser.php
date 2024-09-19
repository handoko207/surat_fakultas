<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratMasterUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid' => ['type' => 'CHAR', 'constraint' => 36, 'null' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_lengkap' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'role' => ['type' => 'ENUM("mahasiswa","operator","admin")', 'default' => 'mahasiswa'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('surat_m_user');
    }

    public function down()
    {
        $this->forge->dropTable('surat_m_user');
    }
}

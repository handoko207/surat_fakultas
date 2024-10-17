<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratPejabat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'uuid' => ['type' => 'CHAR', 'constraint' => 36, 'unique' => true, 'null' => true],
            'nip' => ['type' => 'VARCHAR', 'constraint' => 18, 'null' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'jabatan' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('surat_r_pejabat');
    }

    public function down()
    {
        $this->forge->dropTable('surat_r_pejabat');
    }
}

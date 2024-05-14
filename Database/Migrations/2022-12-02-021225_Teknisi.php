<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teknisi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_teknisi' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_teknisi', true, true);
        $this->forge->createTable('teknisi');
    }

    public function down()
    {
        $this->forge->dropTable('teknisi');
    }
}

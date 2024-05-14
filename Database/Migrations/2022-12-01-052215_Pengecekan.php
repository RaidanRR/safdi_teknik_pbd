<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge;

class Pengecekan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_pengecekan' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_teknisi' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'harga_perbaikan' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_customer' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'deskripsi_pengecekan' => [
                'type'       => 'TEXT',
            ],
            'tanggal' => [
                'type'       => 'DATETIME',
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
        $this->forge->addKey('kode_pengecekan', true, true);
        $this->forge->addKey('id_teknisi', false, false);
        $this->forge->addKey('id_customer', false, false);
        $this->forge->createTable('pengecekan');
    }

    public function down()
    {
        $this->forge->dropTable('pengecekan');
    }
}

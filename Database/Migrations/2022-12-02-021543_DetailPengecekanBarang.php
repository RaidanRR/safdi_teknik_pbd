<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPengecekanBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_pengecekan' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'kode_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'keluhan_barang' => [
                'type'       => 'TEXT'
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 3,
                'unsigned'   => true,
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
        $this->forge->addKey('id', true, true);
        $this->forge->addKey('kode_pengecekan');
        $this->forge->addKey('kode_barang');
        $this->forge->createTable('detail_pengecekan_barang');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pengecekan_barang');
    }
}

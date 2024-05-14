<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangCustomer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('kode_barang',true,true);
        $this->forge->createTable('barang_customer');
    }

    public function down()
    {
        $this->forge->dropTable('barang_customer');
    }
}

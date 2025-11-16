<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MappBukuTamu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_buku_tamu' => [
                'type'       => 'INT'
            ],
            'jumlah_sampel' => [
                'type'       => 'INT'
            ],
            'id_penyakit' => [
                'type'       => 'INT'
            ],
            'is_active' => [
                'type'  => 'BOOLEAN',
                'default' => 1
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'created_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'updated_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mapp_buku_tamu');
    }

    public function down()
    {
        $this->forge->dropTable('mapp_buku_tamu');
    }
}

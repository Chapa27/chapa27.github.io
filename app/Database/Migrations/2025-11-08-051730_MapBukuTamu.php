<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MapBukuTamu extends Migration
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
                'type'           => 'INT'
            ],
            'jumlah_sampel' => [
                'type'       => 'INT'
            ],
            'jumlah_coolbox' => [
                'type'       => 'INT'
            ],
            'id_penyakit' => [
                'type'       => 'INT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'created_by' => [
                'type'       => 'VARCHAR',
                'constraint'     => '100'
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint'     => '100'
            ],
        ]);
        $this->forge->addKey('id', true); // Add primary key
        $this->forge->createTable('map_buku_tamu'); // Create the 'users' table
    }

    public function down()
    {
        $this->forge->dropTable('map_buku_tamu'); // Create the 'users' table
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BukuTamuRev extends Migration
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
            'no_urut' => [
                'type'       => 'CHAR',
                'constraint' => '5',
            ],
            'tanggal' => [
                'type'       => 'DATE'
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pengirim' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_daerah' => [
                'type'       => 'INT'
            ],
            'id_keperluan' => [
                'type'       => 'INT'
            ],
            'jam_masuk' => [
                'type'       => 'TIME'
            ],
            'jam_keluar' => [
                'type'       => 'TIME'
            ],
            'no_telepon' => [
                'type'       => 'CHAR',
                'constraint' => '25'
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
        $this->forge->createTable('buku_tamu'); // Create the 'users' table
    }

    public function down()
    {
         $this->forge->dropTable('buku_tamu');
    }
}

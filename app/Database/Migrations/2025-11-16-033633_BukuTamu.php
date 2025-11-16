<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BukuTamu extends Migration
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
            'no_antrian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
            'id_instansi' => [
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
                'constraint' => '20',
            ],
            'catatan' => [
                'type'       => 'TEXT'
            ],
            'jumlah_coolbox' => [
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
        $this->forge->createTable('buku_tamu');
    }

    public function down()
    {
        $this->forge->dropTable('buku_tamu');
    }
}

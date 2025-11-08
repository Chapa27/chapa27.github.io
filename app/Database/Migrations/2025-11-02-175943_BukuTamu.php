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
                'type'       => 'CHAR',
                'constraint' => '4',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pengirim' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_hp' => [
                'type'       => 'CHAR',
                'constraint' => '25',
            ],
            'id_keperluan' => [
                'type'       => 'INT'
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_penyakit' => [
                'type'       => 'INT'
            ],
            'id_daerah' => [
                'type'       => 'INT'
            ],
            'tgl_kunjung' => [
                'type'       => 'DATE'
            ],
            'jam_masuk' => [
                'type'       => 'TIME'
            ],
            'jam_keluar' => [
                'type'       => 'TIME'
            ],
            'jumlah_sampel' => [
                'type'       => 'INT'
            ],
            'file_bebas_biaya' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'file_spesimen' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku_tamu');
    }

    public function down()
    {       
         $this->forge->dropTable('buku_tamu');
    }
}

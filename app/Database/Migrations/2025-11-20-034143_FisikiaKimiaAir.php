<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FisikiaKimiaAir extends Migration
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
            'kode_sampel' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'id_jenis_sampel' => [
                'type'       => 'INT'
            ],
            'lokasi_pengambilan_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'tgl_pengambilan_sampel' => [
                'type'       => 'DATE'
            ],
            'jam_pengambilan_sampel' => [
                'type'       => 'TIME'
            ],
            'metode_pemeriksaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'volume_atau_berat' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'jenis_wadah' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'jenis_pengawet' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '10',
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
        $this->forge->createTable('fisika_kimia_air');
    }

    public function down()
    {
        $this->forge->dropTable('fisika_kimia_air');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenanggungJawabLhu extends Migration
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
            'alat_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'nama_pjb' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'no_telp' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'penerima_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'id_laboratorium' => [
                'type'       => 'INT'
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
        $this->forge->createTable('penanggung_jawab_lhu');
    }

    public function down()
    {
        $this->forge->dropTable('penanggung_jawab_lhu');
    }
}

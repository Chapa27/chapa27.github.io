<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KondisiLingkunganSekitarSampel extends Migration
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
            'kondisi_lingkungan_sekitar_sampel' => [
                'type'       => 'TEXT'
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
        $this->forge->createTable('kondisi_lingkungan_sekitar_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('kondisi_lingkungan_sekitar_sampel');
    }
}

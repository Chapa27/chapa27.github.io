<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisSampelMaster extends Migration
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
            'jenis_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pnbp' => [
                'type'       => 'NUMERIC'
            ],
            'id_lab' => [
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
        $this->forge->createTable('master_jenis_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('master_jenis_sampel');
    }
}

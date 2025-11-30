<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengaturanCoolbox extends Migration
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
            'id_instansi' => [
                'type'       => 'INT',
            ],
            'id_coolbox' => [
                'type'       => 'INT'
            ],
            'status' => [
                'type'       => 'INT',
                'default'    => 1
            ],
            'keterangan' => [
                'type'       => 'TEXT'
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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
        $this->forge->createTable('pengaturan_coolbox');
    }

    public function down()
    {
        $this->forge->dropTable('pengaturan_coolbox');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterCoolbox extends Migration
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
            'kode_coolbox' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'id_instansi' => [
                'type'       => 'DATE'
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
        $this->forge->createTable('master_coolbox');
    }

    public function down()
    {
        $this->forge->dropTable('master_coolbox');
    }
}

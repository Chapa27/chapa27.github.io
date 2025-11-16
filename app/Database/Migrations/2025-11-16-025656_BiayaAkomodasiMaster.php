<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BiayaAkomodasiMaster extends Migration
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
            'uraian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'transport' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'uang_harian' => [
                'type'       => 'NUMERIC'
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
        $this->forge->createTable('master_biaya_akomodasi');
    }

    public function down()
    {
        $this->forge->dropTable('master_biaya_akomodasi');
    }
}

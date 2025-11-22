<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaboratoriumTujuan extends Migration
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
            'id_pelanggan' => [
                'type'       => 'INT'
            ],
            'kode_lhu' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'id_laboratorium' => [
                'type'       => 'INT'
            ],
            'id_kat_lab'  => [
                'type'    => 'INT',
                'default' => 1
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
        $this->forge->createTable('laboratorium_tujuan');
    }

    public function down()
    {
        $this->forge->dropTable('laboratorium_tujuan');
    }
}

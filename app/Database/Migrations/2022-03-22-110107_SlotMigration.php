<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SlotMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_planning'    => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'fk_company'  => [
                'type'    => 'INT',
                'constraint'  => 5,
            ],
            'date_slot' => [
                'type' => 'DATETIME',
            ],
            'child_remaining' => [
                'type' => 'INT',
                'constraint' => 2,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('slot');
    }

    public function down()
    {
        $this->forge->dropTable('slot');
    }
}

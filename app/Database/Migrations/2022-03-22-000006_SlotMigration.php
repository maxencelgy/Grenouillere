<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SlotMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_slot'            => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_planning'    => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'fk_company'  => [
                'type'    => 'INT',
                'constraint'  => 5,
                'unsigned'       => true,
            ],
            'date_slot' => [
                'type' => 'DATETIME',
            ],
            'child_remaining' => [
                'type' => 'INT',
                'constraint' => 2,
            ]
        ]);
        $this->forge->addKey('id_slot', true);
        $this->forge->addForeignKey('fk_planning', 'planning', 'id_planning');
        $this->forge->addForeignKey('fk_company', 'company', 'id_company');
        $this->forge->createTable('slot');
        
    }

    public function down()
    {
        $this->forge->dropTable('slot');
    }
}
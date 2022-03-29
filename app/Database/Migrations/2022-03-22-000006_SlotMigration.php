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
                'type' => 'DATE',
            ],
            'child_remaining_slot' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'created_at_slot datetime default current_timestamp',
            'updated_at_slot datetime default current_timestamp on update current_timestamp',
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

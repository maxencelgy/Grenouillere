<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PlanningMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_planning'    => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'libelle_planning'  => [
                'type'       => 'TEXT',
                'constraint'     => '1000',
            ],
        ]);
        $this->forge->addKey('id_planning', true);
        $this->forge->createTable('planning');
    }

    public function down()
    {
        $this->forge->dropTable('planning');
    }
}
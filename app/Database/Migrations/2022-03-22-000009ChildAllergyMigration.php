<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChildAllergyMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_child_allergy'   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_child'    => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'fk_id_allergy'  => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('id_child_allergy', true);
        $this->forge->createTable('child_allergy');
        $this->addForeignKey('fk_child', 'child', 'id_child');
        $this->addForeignKey('fk_disease', 'allergy', 'id_allergy');
    }

    public function down()
    {
        $this->forge->dropTable('child_allergy');
    }
}
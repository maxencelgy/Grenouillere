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
            'fk_child'    => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'fk_allergy'  => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'description_allergy' => [
                'type'       => 'TEXT',
            ],
            'created_at_allergy datetime default current_timestamp',
            'updated_at_allergy datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_child_allergy', true);
        $this->forge->addForeignKey('fk_child', 'child', 'id_child');
        $this->forge->addForeignKey('fk_allergy', 'allergy', 'id_allergy');
        $this->forge->createTable('child_allergy');
    }

    public function down()
    {
        $this->forge->dropTable('child_allergy');
    }
}
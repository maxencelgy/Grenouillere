<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChildAllergyMigration extends Migration
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
            'id_child'    => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'fk_id_allergy'  => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('child_allergy');
    }

    public function down()
    {
        $this->forge->dropTable('child_allergy');
    }
}

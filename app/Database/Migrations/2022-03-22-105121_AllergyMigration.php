<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AllergyMigration extends Migration
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
            'id_allergy'    => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'name_allergy'  => [
                'type'       => 'VARCHAR',
                'constraint'     => '180',
            ],
            'description_allergy' => [
                'type'       => 'TEXT',
                'constraint'     => '1000',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('allergy');
    }

    public function down()
    {
        $this->forge->dropTable('allergy');
    }
}

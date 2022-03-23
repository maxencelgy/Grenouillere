<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AllergyMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_allergy'     => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_allergy'  => [
                'type'       => 'VARCHAR',
                'constraint'     => '180',
            ],
            'description_allergy' => [
                'type'       => 'TEXT',
                'constraint'     => '1000',
            ],
            'created_at_allergy datetime default current_timestamp',
            'updated_at_allergy datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_allergy', true);
        $this->forge->createTable('allergy');
    }

    public function down()
    {
        $this->forge->dropTable('allergy');
    }
}
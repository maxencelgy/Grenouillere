<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DiseaseMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_disease'    => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_disease'  => [
                'type'       => 'VARCHAR',
                'constraint'     => '180',
            ],
            'description_disease' => [
                'type'       => 'TEXT',
                'constraint'     => '1000',
            ]
        ]);
        $this->forge->addKey('id_disease', true);
        $this->forge->createTable('disease');
    }

    public function down()
    {
        $this->forge->dropTable('disease');
    }
}
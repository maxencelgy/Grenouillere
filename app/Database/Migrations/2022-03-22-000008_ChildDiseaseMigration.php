<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChildDiseaseMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_child_disease'   => [
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
            'fk_disease'  => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'description_child_disease' => [
                'type' => 'TEXT',
            ],
            'created_at_child_disease datetime default current_timestamp',
            'updated_at_child_disease datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_child_disease', true);
        $this->forge->addForeignKey('fk_child', 'child', 'id_child');
        $this->forge->addForeignKey('fk_disease', 'disease', 'id_disease');
        $this->forge->createTable('child_disease');
    }

    public function down()
    {
        $this->forge->dropTable('child_disease');
    }
}
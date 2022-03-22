<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChildDiseaseMigration extends Migration
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
            'fk_id_disease'  => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('child_disease');
    }

    public function down()
    {
        $this->forge->dropTable('child_disease');
    }
}

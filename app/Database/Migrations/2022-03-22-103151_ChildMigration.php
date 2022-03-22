<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChildMigration extends Migration
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
            'last_name_child'    => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'first_name_child'  => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'birthday_child' => [
                'type' => 'DATETIME',
            ],
            'need_child' => [
                'type'       => 'TEXT',
                'constraint' => '1000',
                'null' => true,
            ],
            'fk_parent' => [
                'type' => 'INT',
                'constraint' => 11
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('child');
    }

    public function down()
    {
        $this->forge->dropTable('child');
    }
}

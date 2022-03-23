<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChildMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_child'           => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_users' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
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
            'created_at_child datetime default current_timestamp',
            'updated_at_child datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id_child', true);
        $this->forge->addForeignKey('fk_users', 'users', 'id_users');
        $this->forge->createTable('child');
    }

    public function down()
    {
        $this->forge->dropTable('child');
    }
}
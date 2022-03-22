<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigration extends Migration
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
            'last_name_users'       => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'first_name_users'  => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'phone_users' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'role_users' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
            ],
            'city_users' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'postal_users' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'adress_users' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

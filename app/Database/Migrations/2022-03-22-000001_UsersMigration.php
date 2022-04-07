<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_users'           => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email_users'       => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'last_name_users'       => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
                'null' => true,
            ],
            'first_name_users'  => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
                'null' => true,
            ],
            'password_users'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
            ],
            'token_users' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at_users datetime default current_timestamp',
            'updated_at_users datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_users', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
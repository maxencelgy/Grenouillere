<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_company'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'name_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'frist_name_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'last_name_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'password_company'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '180',
            ],
            'city_company'  => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'postal_code_company' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true,
            ],
            'adress_company' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'x_company' => [
                'type' => 'FLOAT',
            ],
            'y_company' => [
                'type' => 'FLOAT',
            ],
            'cni_company' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'siret_company' => [
                'type' => 'VARCHAR',
                'constraint' => '14',
            ],
            'rib_company' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'certificate_company' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'licence_company' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kbis_company' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'hourly_rate_company' => [
                'type' => 'FLOAT',
            ],
            'child_capacity_company' => [
                'type' => 'INT',
            ],
            'description_company' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at_company datetime default current_timestamp',
            'updated_at_company datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_company', true);
        $this->forge->createTable('company');
    }

    public function down()
    {
        $this->forge->dropTable('company');
    }
}
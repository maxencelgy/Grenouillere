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
                'type' => 'TEXT',
            ],
            'siret_company' => [
                'type' => 'VARCHAR',
                'constraint' => '14',
            ],
            'rib_company' => [
                'type' => 'TEXT',
            ],
            'hourly_rate_company' => [
                'type' => 'FLOAT',
            ],
            'child_capacity_company' => [
                'type' => 'INT',
            ]
        ]);
        $this->forge->addKey('id_company', true);
        $this->forge->createTable('company');
    }

    public function down()
    {
        $this->forge->dropTable('company');
    }
}
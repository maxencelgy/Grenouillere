<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FactureMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_facture'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_company'    => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'fk_users'  => [
                'type'    => 'INT',
                'constraint'  => 5,
                'unsigned'       => true,
            ],
            'date_facture' => [
                'type'    => 'DATETIME',
            ],
            'created_at_facture datetime default current_timestamp',
            'updated_at_facture datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_facture', true);
        $this->forge->addForeignKey('fk_company', 'company', 'id_company');
        $this->forge->addForeignKey('fk_users', 'users', 'id_users');
        $this->forge->createTable('facture');
    }

    public function down()
    {
        $this->forge->dropTable('facture');
    }
}
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FactureMigration extends Migration
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
            'fk_company'    => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'fk_users'  => [
                'type'    => 'INT',
                'constraint'  => 5,
            ],
            'date_facture' => [
                'type'    => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('facture');
    }

    public function down()
    {
        $this->forge->dropTable('facture');
    }
}

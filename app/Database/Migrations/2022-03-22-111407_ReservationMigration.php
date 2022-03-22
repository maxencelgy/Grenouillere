<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReservationMigration extends Migration
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
            'fk_child'    => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'fk_slot'  => [
                'type'    => 'INT',
                'constraint'  => 5,
            ],
            'fk_facture' => [
                'type'    => 'INT',
                'constraint'  => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reservation');
    }

    public function down()
    {
        $this->forge->dropTable('reservation');
    }
}

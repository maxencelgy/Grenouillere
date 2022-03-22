<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReservationMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reservation'     => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_child'    => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'fk_slot'  => [
                'type'    => 'INT',
                'constraint'  => 5,
                'unsigned'       => true,
            ],
            'fk_facture' => [
                'type'    => 'INT',
                'constraint'  => 5,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_reservation', true);
        $this->forge->addForeignKey('fk_child', 'child', 'id_child');
        $this->forge->addForeignKey('fk_slot', 'slot', 'id_slot');
        $this->forge->addForeignKey('fk_facture', 'facture', 'id_facture');
        $this->forge->createTable('reservation');
    }

    public function down()
    {
        $this->forge->dropTable('reservation');
    }
}
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PlanningSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/planning.json");
        $planning = json_decode($json);

        foreach ($planning as $item) {
            $this->db->table('planning')->insert([
                "libelle_planning" => $item->libelle_planning,
                "created_at_planning" => $item->created_at_planning,
            ]);
        }
    }
}

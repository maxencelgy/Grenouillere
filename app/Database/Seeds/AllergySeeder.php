<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllergySeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/allergy.json");
        $allergy = json_decode($json);

        foreach ($allergy as $item){
            $this->db->table('allergy')->insert([
                "name_allergy" => $item->name_allergy,
            ]);
        }
    }
}

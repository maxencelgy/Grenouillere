<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/disease.json");
        $disease = json_decode($json);

        foreach ($disease as $item){
            $this->db->table('disease')->insert([
                "name_disease" => $item->name_disease,
            ]);
        }
    }
}

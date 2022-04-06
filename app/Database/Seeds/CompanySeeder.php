<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/company.json");
        $company = json_decode($json);

        foreach ($company as $item) {
            $this->db->table('company')->insert([
                "email_company" => $item->email_company,
                "name_company" => $item->name_company,
                "frist_name_company" => $item->frist_name_company,
                "last_name_company" => $item->last_name_company,
                "password_company" => password_hash($item->password_company, PASSWORD_DEFAULT),
                "status_company" => $item->status_company,
                "city_company" => $item->city_company,
                "postal_code_company" => $item->postal_code_company,
                "adress_company" => $item->adress_company,
                "x_company" => $item->x_company,
                "y_company" => $item->y_company,
                "siret_company" => $item->siret_company,
                "hourly_rate_company" => $item->hourly_rate_company,
                "child_capacity_company" => $item->child_capacity_company,
                "created_at_company" => $item->created_at_company,
            ]);
        }
    }
}

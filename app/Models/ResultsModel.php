<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultsModel extends Model
{
    protected $table = 'company';
    protected $allowedFields = ['email_company', 'name_company', 'city_company', 'postal_code_company', 'adress_company',
        'x_company', 'y_company'];
    protected $primaryKey    = 'id_company';

    public function createJsonFile()
    {
        $sql = $this->select('name_company,city_company,postal_code_company,
        adress_company,x_company,y_company')->findAll();
        $json = json_encode($sql);
        $jsonFile = file_put_contents("api_company.json", $json);
    }

    public function getAllCompany(){
        return $this->select('email_company,name_company,frist_name_company,last_name_company,
        city_company,postal_code_company,adress_company,x_company,y_company,siret_company,hourly_rate_company,
        child_capacity_company')->findAll();
    }

}
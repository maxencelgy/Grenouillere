<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultsModel extends Model
{
    protected $table = 'company';
    protected $allowedFields = ['email_company', 'name_company', 'city_company', 'postal_code_company', 'adress_company',
        'x_company', 'y_company'];
    protected $primaryKey    = 'id_company';

    public function createJsonFile($postalCode, $enfant)
    {
        $sql = $this->select('name_company,city_company,postal_code_company,
        adress_company,x_company,y_company,child_capacity_company,hourly_rate_company')
            ->where('postal_code_company', $postalCode)
            ->where('child_capacity_company >=', $enfant)
            ->findAll();
        $json = json_encode($sql);
        $jsonFile = file_put_contents("api_company.json", $json);
    }

    public function getAllCompany(){
        $companyData = file_get_contents('api_company.json');
        $jsonDecode = json_decode($companyData);
        return $jsonDecode;
    }

}
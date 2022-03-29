<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultsModel extends Model
{
    protected $table = 'company';
    protected $allowedFields = ['email_company', 'name_company', 'city_company', 'postal_code_company', 'adress_company',
        'x_company', 'y_company'];
    protected $primaryKey    = 'id_company';

    public function getDataParseJson()
    {
        $sql = $this->select('email_company,name_company,city_company,postal_code_company,
        adress_company,x_company,y_company')->findAll();
        $json = json_encode($sql);
        $jsonFile = file_put_contents("api_company.json", $json);
    }

}

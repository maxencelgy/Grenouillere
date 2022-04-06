<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultsModel extends Model
{
    protected $table = 'company';
    protected $allowedFields = ['email_company', 'name_company', 'status_company', 'city_company', 'postal_code_company', 'adress_company',
        'x_company', 'y_company'];
    protected $primaryKey    = 'id_company';

    public function createJsonFile($postalCode, $enfant, $planning, $day)
    {
        $sql = $this->select('id_company,name_company,city_company,postal_code_company,
        adress_company,x_company,y_company,child_capacity_company,hourly_rate_company')
            ->join('slot', 'slot.fk_company = id_company')
            ->where('fk_planning =', $planning)
            ->where('slot.date_slot =', $day)
            ->where('slot.child_remaining_slot >=', $enfant)
            ->where('postal_code_company', $postalCode)
            ->where('status_company=', 'valid')
            ->findAll();
        $json = json_encode($sql);
        $jsonFile = file_put_contents("api_company.json", $json);
    }

    public function createJsonFileWithoutPostal($enfant, $planning, $day)
    {
        $sql = $this->select('id_company,name_company,city_company,postal_code_company,
        adress_company,x_company,y_company,child_capacity_company,hourly_rate_company')
            ->join('slot', 'slot.fk_company = id_company')
            ->where('fk_planning =', $planning)
            ->where('slot.date_slot =', $day)
            ->where('slot.child_remaining_slot >=', $enfant)
            ->where('status_company=', 'valid')
            ->findAll();
        $json = json_encode($sql);
        $jsonFile = file_put_contents("api_company.json", $json);
    }


    public function getAllCompany(){
        $companyData = file_get_contents('api_company.json');
        $jsonDecode = json_decode($companyData);
        return $jsonDecode;
    }

    public function getCompanyById($id){
        $companyData = file_get_contents('api_company.json');
        $jsonDecode = json_decode($companyData);
        foreach ($jsonDecode as $jsonItem){
            if($jsonItem->id_company === $id){
                return $jsonItem;
            }
        }
    }

}
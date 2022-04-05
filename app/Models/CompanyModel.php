<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'company';
    protected $primaryKey       = 'id_company';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;

    protected $protectFields    = true;
    protected $allowedFields    = [
    'email_company', 
    'name_company', 
    'frist_name_company',
    'last_name_company',
    'password_company',
    'status_company',
    'city_company',
    'postal_code_company',
    'adress_company',
    'x_company',
    'y_company',
    'siret_company',
    'cni_company',
    'rib_company',
    'certificate_company',
    'licence_company',
    'kbis_company',
    'hourly_rate_company',
    'child_capacity_company'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;



    public function insertCompany(array $data)
    {
        return $this->insert($data);
    }


    public function getInfoCompany(int $id)
    {
        return $this->select('*')
        ->where('id_company',$id)
        ->find();
    }


    public function updateFolder($id, $row ,$data){
        return $this->update($id, [
            $row => "/upload/".$data
        ]);
    }


    public function companyData($id){
        return $this->select('email_company, name_company, last_name_company, city_company, postal_code_company,
         adress_company, siret_company, hourly_rate_company, child_capacity_company, status_company')
            ->where('id_company=', $id)
            ->find();
    }

    public function companyFolder($id){
        return $this->select('cni_company, rib_company, certificate_company, licence_company, kbis_company')
            ->where('id_company=', $id)
            ->find();
    }

    public function updateCompany($id, $data){
        return $this->update($id, $data);
    }
}
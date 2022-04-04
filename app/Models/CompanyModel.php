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
    'rib_company',
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

}
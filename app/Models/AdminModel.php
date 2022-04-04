<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'company';
    protected $primaryKey       = 'id_company';
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
        'child_capacity_company'
    ];

    public function getAllCompany()
    {
        return $this->findAll();
    }
}

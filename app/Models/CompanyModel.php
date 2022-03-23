<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'companies';
    protected $primaryKey       = 'id_company';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;

    protected $protectFields    = true;
    protected $allowedFields    = [
    'frist_name_company',
    'last_name_company',
    'password_company',
    'status_company',
    'city_company',
    'postal_code_company',
    'adress_company',
    'x_company',
    'y_company',
    'cni_company',
    'siret_company',
    'rib_company',
    'hourly_rate_company',
    'child_capacity_company'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function ajout()
    {
        $input = $this->validate([
            'frist_name_company' => 'required',
            'last_name_company' => 'required',
            'password_company' => 'required',            
            'status_company' => 'required',            
            'city_company' => 'required',            
            'postal_code_company' => 'required',            
            'adress_company' => 'required',            
            'password_company' => 'required',            
            'x_company' => 'required',            
            'y_company' => 'required',            
            'cni_company' => 'required',            
            'siret_company' => 'required',            
            'rib_company' => 'required',            
            'child_capacity_company' => 'required',         
        ]);

        if($input)
        {
       // POST
        $this->eleveModel->insertEleve([
        //TODO:
        'champs' => $this->request->getPost('input'),
        ]);  
   // return redirect()->to('/');


            
            
        }
        return redirect()->to('/');
    }

}
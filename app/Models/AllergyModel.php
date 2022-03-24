<?php

namespace App\Models;

use CodeIgniter\Model;

class allergyModel extends Model
{
    protected $table = 'allergy';
    protected $allowedFields = ['name_allergy'];
    protected $primaryKey = 'id_allergy';


    public function insertAllergy(array $data)
    {
        return $this->insert($data);
    }

    public function getAllAllergy(){
        return $this->findAll();
    }

}
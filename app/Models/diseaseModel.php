<?php

namespace App\Models;

use CodeIgniter\Model;

class diseaseModel extends Model
{
    protected $table = 'disease';
    protected $allowedFields = ['name_disease'];
    protected $primaryKey = 'id_disease';


    public function insertDisease(array $data)
    {
        return $this->insert($data);
    }

    public function getAllDisease(){
        return $this->findAll();
    }

}
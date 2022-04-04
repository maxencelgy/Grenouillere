<?php

namespace App\Models;

use CodeIgniter\Model;

class ChildAllergyModel extends Model
{
    protected $table = 'child_allergy';
    protected $allowedFields = ['fk_child', 'fk_allergy', 'description_allergy'];
    protected $primaryKey = 'id_child_allergy';


    public function insertAllergyChild(array $data)
    {
        return $this->insert($data);
    }

   


}
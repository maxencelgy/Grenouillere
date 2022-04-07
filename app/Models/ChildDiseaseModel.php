<?php

namespace App\Models;

use CodeIgniter\Model;

class ChildDiseaseModel extends Model
{
    protected $table = 'child_disease';
    protected $allowedFields = ['fk_child', 'fk_disease', 'description_child_disease'];
    protected $primaryKey = 'id_child_disease';


    public function insertDiseaseChild(array $data)
    {
        return $this->insert($data);
    }

    public function deleteById($id)
    {
        return $this->where("fk_child", $id)
                    ->delete();
    }


}
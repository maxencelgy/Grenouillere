<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanningModel extends Model
{
    protected $table = 'planning';
    protected $allowedFields = ['id_planning','libelle_planning'];
    protected $primaryKey = 'id_planning';

    public function getAll(){
        return $this->select('id_planning, libelle_planning')
        ->findAll();

    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;


class SlotModel extends Model
{
    protected $table = 'slot';
    protected $allowedFields = ['fk_planning','fk_company','date_slot'];
    protected $primaryKey = 'id_slot';


    public function verifyOccurence($planning, $fkCompany, $dateSlot)
    {
        return $this->select('id_slot')
            ->where("fk_planning = $planning")
            ->where("fk_company = $fkCompany")
            ->where("date_slot = '$dateSlot'")
            ->findAll();
    }

    public function getAll()
    {
        return $this->findAll();
    }

}
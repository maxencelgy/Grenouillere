<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;


class SlotModel extends Model
{
    protected $table = 'slot';
    protected $allowedFields = ['fk_planning', 'fk_company', 'date_slot','child_remaining_slot'];
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

    // trouver tous les slots
    // trouver tous les slots d'une date (semaine correpodante)
    // trouver les slots d'une company 
    public function findAllSlotByCompanyAndWeek($fkCompany, $date)
    {
        return $this->select('id_slot,fk_planning, fk_company, date_slot, child_remaining_slot')
            ->where('fk_company =', $fkCompany)
            ->where('date_slot >=', $date)
            ->findAll();
    }

    public function getIdCompanyBySlot($idSlot)
    {
        return $this->select('fk_company')
            ->where('id_slot =', $idSlot)
            ->find();
    }

    public function getChildRemainingBySlot($idSlot)
    {
        return $this->select('child_remaining_slot')
        ->where('id_slot =', $idSlot)
        ->find();
    }
    public function putNewChildRemaining($id_slot, $data)
    {
        $this->update($id_slot, $data);
    }

}


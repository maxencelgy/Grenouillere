<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservation';
    protected $allowedFields = ['fk_child', 'fk_slot', 'fk_facture'];
    protected $primaryKey    = 'id_reservation';

    public function getAllReservations()
    {
        return $this->findAll();
    }

    public function insertReservation(array $data)
    {
        return $this->insert($data);
    }

    public function getReservationsWithChildren()
    {
        return $this
            ->select('
            reservation.id_reservation,
        
            child.last_name_child,
            child.first_name_child,
            child.birthday_child,

            slot.child_remaining_slot,
            slot.date_slot,

            company.frist_name_company,
            company.last_name_company,

            ')
            ->join('child', 'child.id_child = reservation.fk_child')
            ->join('slot', 'slot.id_slot = reservation.fk_slot')
            ->join('company', 'company.id_company = slot.fk_company')
            ->findAll();
    }

    public function getReservationsWithChildrenById($id)
    {
        return $this
            ->select('
            reservation.id_reservation,
        
            child.last_name_child,
            child.first_name_child,
            child.birthday_child,

            slot.child_remaining_slot,
            slot.date_slot,

            company.frist_name_company,
            company.last_name_company,

            ')
            ->where('id_reservation=' . $id)
            ->join('child', 'child.id_child = reservation.fk_child')
            ->join('slot', 'slot.id_slot = reservation.fk_slot')
            ->join('company', 'company.id_company = slot.fk_company')
            ->find();
    }

    public function getReservationsWithCompanyById($id)
    {
        return $this
            ->select('
            reservation.id_reservation,
        
            child.last_name_child,
            child.first_name_child,
            child.birthday_child,

            slot.child_remaining_slot,
            slot.date_slot,

            company.frist_name_company,
            company.last_name_company,

            ')
            ->where('id_company=' . $id)
            ->join('child', 'child.id_child = reservation.fk_child')
            ->join('slot', 'slot.id_slot = reservation.fk_slot')
            ->join('company', 'company.id_company = slot.fk_company')
            ->find();
    }
    public function getCountFactures($idFacture)
    {
        return $this
            ->where('fk_facture', $idFacture)
            ->countAllResults();
    }
    
    public function getAllSlotByFacture($idFacture)    {
        return $this->select('first_name_child,date_slot,libelle_planning,fk_company,id_slot')
        ->join('child', 'reservation.fk_child = child.id_child')
        ->join('slot', 'reservation.fk_slot = slot.id_slot')
        ->join('planning', 'slot.fk_planning = planning.id_planning')
        ->where('fk_facture', $idFacture)
        ->orderBy("date_slot")
        ->orderBy("fk_planning")
        ->findAll();
    }
    public function getAllUserFacture($idUser)
    {
        return $this->select('fk_facture,date_facture')
        ->join('facture', 'facture.id_facture = reservation.fk_facture')
        ->where('fk_users', $idUser)
        ->distinct()
        ->findAll();
    }

    public function deleteById($id)
    {
        return $this->where("fk_child", $id)
                    ->delete();
    }
}
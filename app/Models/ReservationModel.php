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
}

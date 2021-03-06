<?php

namespace App\Models;

use CodeIgniter\Model;

class FactureModel extends Model
{
    protected $table = 'facture';
    protected $allowedFields = ['fk_company', 'fk_users','date_facture' ];
    protected $primaryKey = 'id_facture';


    public function insertFacture(array $data)
    {
        return $this->insert($data);
    }
    
    public function getAll()
    {
        return $this->findAll();
    }

    public function getLastFactureByUser($idUser)
    {
        return $this->select('id_facture')
        ->where('fk_users=' . $idUser)
        ->orderBy("updated_at_facture", "DESC")
        ->limit(1)
        ->find();
    }

    public function getDateFacture($idFacture)
    {
        return $this->select('date_facture')
        ->where('id_facture=' . $idFacture)
        ->find();
    }

    public function getUserFacture($idFacture)
    {
        return $this->select('fk_users')
        ->where('id_facture=' . $idFacture)
        ->find();
    }

    public function getHourlyRate($idFacture)
    {
        return $this
            ->select('hourly_rate_company')
            ->join('company', 'facture.fk_company = company.id_company')
            ->where('id_facture', $idFacture)
            ->find();
    }
    
}
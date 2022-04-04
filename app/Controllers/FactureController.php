<?php

namespace App\Controllers;

class FactureController extends BaseController
{

    private $factureModel;
    public function __construct()
    {
        $this->factureModel = model('App\Models\FactureModel');
        $this->reservationModel = model('App\Models\ReservationModel');
        $this->companyModel = model('App\Models\CompanyModel');
        $this->usersModel = model('App\Models\UserModel');
    }

    public function lastFactureUser($idFacure = false)
    {   
        // s'il n'y a pas de facture renseiger on prend par défault celle de l'utilsateur
        if($idFacure === false){   
            $idUser = session()->get('id');
            $idFacure = $this->factureModel->getLastFactureByUser($idUser)[0]['id_facture'];
        }else{
            // TODO:si on possède la facture, on doit chercher l'id User pour être sur que la facture soit correct
            $idUser = session()->get('id');
        }        
        $slot = $this->reservationModel->getAllSlotByFacture($idFacure);
        // tous les slots on le même id company, on prend le 0 pour être sur d'avoir un résultat
        // avec l'id company on récup toutes les infos dont on a besoin
        $company = $this->companyModel->getInfoCompany($slot[0]['fk_company'])[0];
        $user = $this->usersModel->getInfoUser($idUser)[0];

        return view('facture/index', [
            'slot' => $slot,
            'company' => $company,
            'user' => $user,
        ]);
    }

}
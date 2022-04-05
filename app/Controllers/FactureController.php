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

        private function debug(array $tableau)
    {
        echo '<pre style="height:300px;overflow-y: scroll;font-size: .7rem;padding: .6rem;font-family: Verdana;background-color: #000;color:#fff;">';
        print_r($tableau);
        echo '</pre>';
    }

    public function lastFactureUser($idFacture = false)
    {   
        // s'il n'y a pas de facture renseiger on prend par défault celle de l'utilsateur
        if($idFacture === false){   
            $idUser = session()->get('id');
            $idFacture = $this->factureModel->getLastFactureByUser($idUser)[0]['id_facture'];
        }else{
            // TODO:si on possède la facture, on doit chercher l'id User pour être sur que la facture soit correct
            $idUser = session()->get('id');
        }        
        $reservations = $this->reservationModel->getAllSlotByFacture($idFacture);
        
        // tous les slots on le même id company, on prend le 0 pour être sur d'avoir un résultat
        // avec l'id company on récup toutes les infos dont on a besoin
        $company = $this->companyModel->getInfoCompany($reservations[0]['fk_company'])[0];
        $user = $this->usersModel->getInfoUser($idUser)[0];
        $dateFacture = $this->factureModel->getDateFacture($idFacture)[0]['date_facture'];
        $dateFacture = date('d/m/Y', strtotime($dateFacture));
        return view('facture/index', [
            'reservations' => $reservations,
            'company' => $company,
            'user' => $user,
            'date' => $dateFacture,
        ]);
    }

}
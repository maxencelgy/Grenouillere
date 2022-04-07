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

    public function factureUser(int $idFacture = null)
    {   
        // s'il n'y a pas de facture renseiger on prend par défault celle de l'utilsateur
        $idUser = session()->get('id');
        if($idFacture === null){   
            $idFacture = $this->factureModel->getLastFactureByUser($idUser)[0]['id_facture'];        
        }else{
        // si on possède la facture, on doit chercher l'id User pour être sur que la facture soit correct
            if($this->factureModel->getUserFacture($idFacture)[0]['fk_users'] != $idUser){
                // On verifie que la facture est bien celle de l'utilisateur
                return redirect('/');
            }
        }
        $reservations = $this->reservationModel->getAllSlotByFacture($idFacture);
        if(empty($reservations)){
            // Si la facture est vide on redirige vers la page d'accueil
            return redirect('/');
        }
        
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
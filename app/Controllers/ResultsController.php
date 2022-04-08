<?php

namespace App\Controllers;

use Stripe;

class ResultsController extends BaseController
{

    private $resultsModel;

    public function __construct()
    {
        helper(["url"]);
        $this->resultsModel = model('App\Models\ResultsModel');
        $this->planningModel = model('App\Models\PlanningModel');
        $this->slotModel = model('App\Models\SlotModel');
        $this->childModel = model('App\Models\ChildrenModel');
        $this->factureModel = model('App\Models\FactureModel');
        $this->reservationModel = model('App\Models\ReservationModel');
        $this->resultsModel = model('App\Models\ResultsModel');
        // findAllSlotByCompanyAndWeek
    }

    public function index()
    {
        if (!empty($_POST)) {
            if (!empty($_POST['postal_code_company'])) {
                $postalCode = $_POST['postal_code_company'];
                $planning = $_POST['horaire'];
                $enfant = $_POST['enfant'];
                $day = $_POST['day'];

                $createFile = $this->resultsModel->createJsonFile($postalCode, $enfant, $planning, $day);
            } else {
                $planning = $_POST['horaire'];
                $enfant = $_POST['enfant'];
                $day = $_POST['day'];

                $createFile = $this->resultsModel->createJsonFileWithoutPostal($enfant, $planning, $day);
            }
            $companyData = $this->resultsModel->getAllCompany();
            echo view('results/global_result', [
                'companyData' => $companyData
            ]);
        } else {
            return redirect()->to('/');
        }
    }

    public function singlePage($id)
    {
        $single_company = $this->resultsModel->getCompanyById($id);
        $planning = $this->planningModel->getAll();
        // On affiche la liste des enfants seulement si l'utilisateur est connecté
        $chidrenList = (!empty(session()->get('id'))) ? $this->childModel->getAllIdNameChildByIdParent(session()->get('id')) : [];
        // correspond à la redirection du bouton "envoyer le planning"
        $slot = $this->slotModel->findAllSlotByCompanyAndWeek($id, date('Y-m-d'));
        $infoBtn = ['/reservation/ajouter/enfant/' . $id, 'Réserver'];
        echo view('results/single_result', [
            'single' => $single_company,
            'planning' => $planning,
            'slot' => $slot,
            "infoBtn" => $infoBtn,
            'chidrenList' => $chidrenList,
//            'infoBtn' => $infoBtn,
        ]);
    }


    public function addReservation($id)
    {
        $idUser = session()->get('id');
        $a = 0;
        $b = 0;
        $newArray = [];

        if(empty($_POST["id_child_0"])){
            return redirect('/');
        }

        // On trie les infos par un modulo de 5 pour faire les requètes
        for ($i = 0; $i < (count($_POST) / 5); $i++) {
            foreach ($_POST['id_child_' . $i] as $child) {
                $newArray[$a]['id_users']    = $idUser;
                $newArray[$a]['id_child']    = $child;
                $newArray[$a]['date_slot']   = $_POST['date_slot_' . $i];
                $newArray[$a]['fk_planning'] = $_POST['fk_planning_' . $i];
                $newArray[$a]['id_slot']     = $_POST['id_slot_' . $i];
                $a++;
                $b++;
            }
            if ($i % 5 == 0) {
                if ($b !== 0) {
                    //Pour avoir un bon incrément
                    $b = 0;
                } else {
                    $a++;
                }
            }
        }

        // On récupère l'id de l'entreprise avec avec celle du slot, comme il n'y a qu'une entreprise
        // on prend que le premier slot.
        // On créer la facture
        $idCompany = $this->slotModel->getIdCompanyBySlot($newArray[0]['id_slot'])[0]['fk_company'];
        $dataFacture = [
            'fk_company' => $idCompany,
            'fk_users' => $idUser,
            'date_facture' => date('Y-m-d')
        ];
        $this->factureModel->insertFacture($dataFacture);
        // $lastUsersFacture = $this->factureModel->getLastUsersFacture($idUser);
        $lastUsersFacture = $this->factureModel->getLastFactureByUser($idUser);
        $idFacture = $lastUsersFacture[0]['id_facture'];
        // Update du nombre de place disponible dans un slot
        $reservation = [];
        // à chaque qu'on appel la fonction on desincremente de 1
        // si c'est inférieur à 0 on annule la requette
        foreach ($newArray as $data) {
            // On verifie que l'emplacement dispo est valide avant d'inserer les données
            $idSlot = intval($data['id_slot']);
            // var_dump($idSlot); 
            $newChildRemainingValue = $this->slotModel ->getChildRemainingBySlot($idSlot)[0]['child_remaining_slot'];
            $newChildRemainingValue = intval($newChildRemainingValue)-1;
            $dataSlot['child_remaining_slot'] = $newChildRemainingValue; 
            $this->slotModel->putNewChildRemaining($idSlot, $dataSlot);
            if($newChildRemainingValue>0){
                // Si OK on agit sur la bdd 
                $reservation['fk_facture'] = $idFacture;
                $reservation['fk_child'] = $data['id_child'];
                $reservation['fk_slot'] = $data['id_slot'];
                $this->reservationModel->insertReservation($reservation);
            }else{
                // cas où il n'y a pas d'emplacement disponible;
                return redirect('/');
            }
            
        }
        $single_company = $this->resultsModel->getCompanyById($id);
        $allChildrenPrice = count($newArray);
        echo view('stripe/stripe', [
            'single' => $single_company,
            'allChildrenPrice' => $allChildrenPrice
        ]);
    }
    public function payment($id)
    {
        $single_company = $this->resultsModel->getCompanyById($id);
        $idUser = session()->get('id');
        $lastUsersFacture = $this->factureModel->getLastFactureByUser($idUser);
        $getCountFactures = $this->reservationModel->getCountFactures($lastUsersFacture[0]['id_facture']);

        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create([
            "amount" =>  $getCountFactures * ($single_company->hourly_rate_company * 100),
            "currency" => "eur",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Paiement à $single_company->name_company"
        ]);

        session()->setFlashdata("message", "Paiement réussi");
        return redirect('/');
    }

}


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
        // findAllSlotByCompanyAndWeek
    }


    public function index()
    {

        if (!empty($_POST)) {
            $postalCode = $_POST['postal_code_company'];
            $planning = $_POST['horaire'];
            $enfant = $_POST['enfant'];
            $day = $_POST['day'];
        } else {
            return redirect()->to('/');
        }

        $createFile = $this->resultsModel->createJsonFile($postalCode, $enfant, $planning, $day);
        $companyData = $this->resultsModel->getAllCompany();
        echo view('results/global_result', [
            'companyData' => $companyData
        ]);
    }

    public function singlePage($id)
    {
        // 

        $single_company = $this->resultsModel->getCompanyById($id);
        $planning = $this->planningModel->getAll();
        // On affiche la liste des enfants seulement si l'utilisateur est connecté
        $chidrenList = (!empty(session()->get('id'))) ? $this->childModel->getAllIdNameChildByIdParent(session()->get('id')) : [];
        // correspond à la redirection du bouton "envoyer le planning"
        $infoBtn = ['/reservation/ajouter/enfant/' . $id, 'Reréserver'];
        $slot = $this->slotModel->findAllSlotByCompanyAndWeek($id, date('Y-m-d'));
        echo view('results/single_result', [
            'single' => $single_company,
            'planning' => $planning,
            'slot' => $slot,
            'chidrenList' => $chidrenList,
            'infoBtn' => $infoBtn
        ]);
    }


    public function addReservation($id)
    {
        $idUser = session()->get('id');
        $a = 0;
        $b = 0;
        $newArray = [];
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
        $idCompany = $this->slotModel->getIdCompanyBySlot($newArray[0]['id_slot'])[0]['fk_company'];
        // On créer la facture
        $dataFacture = [
            'fk_company' => $idCompany,
            'fk_users' => $idUser,
            'date_facture' => date('Y-m-d')
        ];
        $this->factureModel->insertFacture($dataFacture);
        // $lastUsersFacture = $this->factureModel->getLastUsersFacture($idUser);
        $lastUsersFacture = $this->factureModel->getLastFactureByUser($idUser);
        $idFacture = $lastUsersFacture[0]['id_facture'];
        $reservation = [];
        foreach ($newArray as $data) {
            $reservation['fk_facture'] = $idFacture;
            $reservation['fk_child'] = $data['id_child'];
            $reservation['fk_slot'] = $data['id_slot'];
            $this->reservationModel->insertReservation($reservation);
        }
        $single_company = $this->resultsModel->getCompanyById($id);
        $allChildrenPrice = count($newArray);
        echo view('stripe/stripe', [
            'single' => $single_company,
            'allChildrenPrice' => $allChildrenPrice
        ]);
    }
    // public function payment($id)
    // {
    //     $single_company = $this->resultsModel->getCompanyById($id);
    //     $idUser = session()->get('id');
    //     $lastUsersFacture = $this->factureModel->getLastFactureByUser($idUser);
    //     $getCountFactures = $this->reservationModel->getCountFactures($lastUsersFacture[0]['id_facture']);

    //     Stripe\Stripe::setApiKey(STRIPE_SECRET);
    //     $stripe = Stripe\Charge::create([
    //         "amount" =>  $getCountFactures * ($single_company->hourly_rate_company * 100 * 4),
    //         "currency" => "eur",
    //         "source" => $_REQUEST["stripeToken"],
    //         "description" => "Paiement à $single_company->name_company"
    //     ]);

    //     return redirect('/utilisateur/facture');
    //     session()->setFlashdata("message", "Paiement réussi");
    // }
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

        return redirect('/utilisateur/facture');
        session()->setFlashdata("message", "Paiement réussi");
    }

}
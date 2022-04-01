<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;

class ProfilController extends BaseController
{

    private $childrenModel;
    private $ChildAllergyModel;
    private $ChildDiseaseModel;
    private $reservationModel;
    private $profilModel;
    public function __construct()
    {

        $this->childrenModel = model('App\Models\ChildrenModel');
        $this->allergyModel = model('App\Models\AllergyModel');
        $this->diseaseModel = model('App\Models\diseaseModel');
        $this->ChildAllergyModel = model('App\Models\ChildAllergyModel');
        $this->ChildDiseaseModel = model('App\Models\ChildDiseaseModel');
        $this->reservationModel = model('App\Models\reservationModel');
        $this->profilModel        = model('App\Models\profilModel');
        $this->planningModel      = model('App\Models\planningModel');
        $this->slotModel          = model('App\Models\slotModel');
    }

    public function index()
    {
        $children = $this->childrenModel->getParentsChild();
        $allergy = $this->allergyModel->getAllAllergy();
        $disease = $this->diseaseModel->getAllDisease();
        $reservations = $this->reservationModel->getReservationsWithCompanyById(session()->get("id"));


        echo view('profil/index', [
            "reservations" => $reservations,
            "childrens" => $children,
            "allergy" => $allergy,
            "disease" => $disease,
        ]);
    }

    public function editCompany()
    {
        $planning = $this->planningModel->getAll();
        $infoBtn = ['/calendar/add','Envoyer le planning'] ;  
        echo view('profil/edit_company', [
            "planning" => $planning,
            "infoBtn" => $infoBtn,
            
        ]);
    }

    public function handlePostCalandar()
    {
        $data = [];
        $a = 0;
        $dataPost = array_values($this->request->getPost());
        for ($i = 0; $i < count($dataPost); $i++) {
            // On créer un tableau avec les données du post (via le JS)
            // on fait un modulo pour savoir si on est sur une date ou un planning
            // On ajoute les données en base de données à la fin du modulo, apres que le tableau aient toutes les infos
            if ($i % 2 == 0) {
                $data[$a]['fk_company'] = session()->get('id');
                $data[$a]['child_remaining_slot'] = session()->get('child_capacity_company');
                $data[$a]['date_slot'] = $dataPost[$i];
            } else {
                $data[$a]['fk_planning'] = $dataPost[$i];
                // verif que les données n'existe pas en déja en base de données
                $occurenceData = $this->slotModel->verifyOccurence($data[$a]['fk_planning'], $data[$a]['fk_company'], $data[$a]['date_slot']);
                // $occurenceData = false;
                if (!$occurenceData) {
                    $this->profilModel->insertCalendar($data[$a]);
                } else {
                    echo 'erreur donnée déja presentent en base !';
                }
                // $this->profilModel->insertCalendar($data[$a]);            
                $a++;
            }
        }
    }
}
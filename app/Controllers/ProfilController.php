<?php

namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;

class ProfilController extends BaseController
{
    private $reservationModel;
    private $profilModel;
    public function __construct()
    {
        $this->reservationModel   = model('App\Models\reservationModel');
        $this->profilModel        = model('App\Models\profilModel');
        $this->planningModel      = model('App\Models\planningModel');
        $this->slotModel          = model('App\Models\slotModel');
    }

    public function index()
    {
        $reservations = $this->reservationModel->getReservationsWithCompanyById(session()->get("id"));
        echo view('profil/index', [
            "reservations" => $reservations,
        ]);
    }

    public function editCompany()
    {
        $planning = $this->planningModel->getAll();
        echo view('profil/edit_company',[
            "planning" => $planning,
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
                if(!$occurenceData){
                    $this->profilModel->insertCalendar($data[$a]); 
                }else{
                    echo'erreur donnée déja presentent en base !';
                }
                $a++;
            }            
        }
    }
}
<?php

namespace App\Controllers;

class ProfilController extends BaseController
{
    private $reservationModel;
    private $profilModel;
    public function __construct()
    {
        $this->reservationModel = model('App\Models\reservationModel');
        $this->profilModel = model('App\Models\profilModel');
        $this->planningModel = model('App\Models\planningModel');
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
        $planing = $this->planningModel->getAll();
        echo view('profil/edit_company',[
            "planing" => $planing,
        ]);
    }

    public function handlePostCalandar()
    {


        function debug($tableau)
        {
            echo '<pre style="height:300px;overflow-y: scroll;font-size: .7rem;padding: .6rem;font-family: Consolas, Monospace;background-color: #000;color:#fff;">';
            print_r($tableau);
            echo '</pre>';
        }


        debug($_POST);
        var_dump(session());
        $tabler = [];
        $string = '';
        $a = 0;
        $tablerPost = array_values($_POST);
        for ($i = 2; $i < count($tablerPost); $i++) {
            if ($i % 2 == 0) {
                $tabler[$a]['date_slot'] = $tablerPost[$i];
            } else {               
                $tabler [$a]['fk_planning'] = $tablerPost[$i];                
                $a++;
            }
        }
        debug($tabler);
        foreach ($tabler as $key) {
            $data = array(
                "fk_company"           => session()->get('id'),
                "child_remaining_slot" => session()->get('child_capacity_company'),
                "fk_planning"          => $key['fk_planning'],
                "date_slot"            => $key['date_slot'],
            );
            $this->profilModel->insertCalendar($data);
        }
    }
}
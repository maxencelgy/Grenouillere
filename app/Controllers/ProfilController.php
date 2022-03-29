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
        echo view('profil/edit_company');
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
        $tabler = [];
        $string = '';

        $j = 0;
        $k = 0;
        $tablerPost = array_values($_POST);


        for ($i = 2; $i < count($tablerPost); $i++) {

            if ($i % 2 == 0) {
                echo 'a';
                $tabler[$j] = $tablerPost[$i];
            } else {
                echo 'b';
                $tabler[$k] = $tablerPost[$i];
            }
        }

        debug($tabler);
        foreach ($tabler as $key) {
            $data = array(
                "fk_company" => $this->request->getPost('fk_company'),
                "child_remaining_slot" => $this->request->getPost('child_remaining_slot'),
                "fk_planning" => $this->request->getPost($string),
                "date_slot" => $this->request->getPost($string),
            );
            $this->profilModel->insertCalendar($data);
        }
    }
}

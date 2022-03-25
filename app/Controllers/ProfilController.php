<?php

namespace App\Controllers;




class ProfilController extends BaseController
{
    private $reservationModel;
    public function __construct()
    {
        $this->reservationModel = model('App\Models\reservationModel');
    }


    public function index()
    {
        $reservations = $this->reservationModel->getReservationsWithCompanyById(session()->get("id"));
        echo view('profil/index', [
            "reservations" => $reservations,
        ]);
    }
}

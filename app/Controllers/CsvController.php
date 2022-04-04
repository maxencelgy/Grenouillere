<?php

namespace App\Controllers;

class CsvController extends BaseController
{

    private $reservationModel;
    private $childrenModel;
    public function __construct()
    {
        $this->reservationModel = model('App\Models\reservationModel');
        $this->childrenModel = model('App\Models\ChildrenModel');
    }

    public function index()
    {
        $reservations = $this->reservationModel->getReservationsWithChildren();
        echo view('csv/index', [
            "reservations" => $reservations,
        ]);
    }


    public function entreprise($id)
    {
        $reservations = $this->reservationModel->getReservationsWithCompanyById($id);
        echo view('csv/index', [
            "reservations" => $reservations,
        ]);
    }

    public function export($id)
    {
        $reservations = $this->reservationModel->getReservationsWithChildrenById($id);
        if (is_null($reservations)) {
            return redirect()->to('/');
        }

        echo view('csv/export_data_to_csv', [
            "reservations" => $reservations,
        ]);
    }

    public function exportAll($id)
    {
        $reservations = $this->reservationModel->getReservationsWithCompanyById($id);
        if (is_null($reservations)) {
            return redirect()->to('/');
        }

        echo view('csv/export_data_to_csv', [
            "reservations" => $reservations,
        ]);
    }
}

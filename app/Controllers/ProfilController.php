<?php

namespace App\Controllers;




class ProfilController extends BaseController
{

    private $childrenModel;
    private $ChildAllergyModel;
    private $ChildDiseaseModel;
    private $reservationModel;
    public function __construct()
    {
        $this->childrenModel = model('App\Models\ChildrenModel');
        $this->allergyModel = model('App\Models\AllergyModel');
        $this->diseaseModel = model('App\Models\diseaseModel');
        $this->ChildAllergyModel = model('App\Models\ChildAllergyModel');
        $this->ChildDiseaseModel = model('App\Models\ChildDiseaseModel');
        $this->reservationModel = model('App\Models\reservationModel');
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
        echo view('profil/edit_company');
    }

}

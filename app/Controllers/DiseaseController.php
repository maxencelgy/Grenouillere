<?php

namespace App\Controllers;

class DiseaseController extends BaseController
{

    private $diseaseModel;
    public function __construct()
    {
        $this->diseaseModel = model('App\Models\diseaseModel');
    }


    private function generateDiseaseFromPost($request)
    {
        return [
            "name_disease" => $this->request->getPost("name_disease")
        ];
    }

    public function addDisease()
    {
        $data = $this->generateDiseaseFromPost($this->request);
        $this->diseaseModel->insertDisease($data);
        return redirect()->to('/create-children');
    }

}
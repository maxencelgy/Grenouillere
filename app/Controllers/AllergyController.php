<?php

namespace App\Controllers;

class allergyController extends BaseController
{

    private $allergyModel;
    public function __construct()
    {
        $this->allergyModel = model('App\Models\allergyModel');
    }


    private function generateAllergyFromPost($request)
    {
        return [
            "name_allergy" => $this->request->getPost("name_allergy")
        ];
    }

    public function addAllergy()
    {
        $data = $this->generateAllergyFromPost($this->request);
        $this->allergyModel->insertAllergy($data);
        return redirect()->to('/create-children');
    }
}
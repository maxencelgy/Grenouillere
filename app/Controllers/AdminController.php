<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    private $companyModel;
    public function __construct()
    {
        $this->companyModel = model('App\Models\AdminModel');
        $this->allergyModel = model('App\Models\AllergyModel');
        $this->diseaseModel = model('App\Models\diseaseModel');
    }

    public function index()
    {
        $companys = $this->companyModel->getAllCompany();
        if (session()->get("role") == "admin") {

            echo view('admin/tables', [
                "companys" => $companys,

            ]);
        } else {
            return redirect()->to('/404');
        }
    }

    public function handleModified()
    {
        $data["status_company"] = $this->request->getPost("status_company");
        $this->companyModel->update($this->request->getPost("id"), $data);
        return redirect()->to('/admin');
    }
    public function viewAllergie()
    {
        $allergys = $this->allergyModel->getAllAllergy();
        $diseases = $this->diseaseModel->getAllDisease();

        echo view('admin/allergy', [
            "allergys" => $allergys,
            "diseases" => $diseases,
        ]);
    }


    public function handleDelete($id)
    {
        $this->allergyModel->deleteById($id);
        return redirect()->to('/admin/allergie');
    }
    public function handleDeleteMaladie($id)
    {
        $this->diseaseModel->deleteById($id);
        return redirect()->to('/admin/allergie');
    }
}

<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    private $companyModel;
    public function __construct()
    {
        $this->companyModel = model('App\Models\AdminModel');
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



    public function handleModify(int $id)
    {
        $entreprise = $this->companyModel->find($id);
        if (is_null($entreprise)) {
            return redirect()->to('/admin');
        }
        echo view('admin/modify', [
            "entreprise" => $entreprise,
        ]);
    }

    public function handleModified()
    {
        $data["status_company"] = $this->request->getPost("status_company");
        $this->companyModel->update($this->request->getPost("id"), $data);
        return redirect()->to('/admin');
    }
}

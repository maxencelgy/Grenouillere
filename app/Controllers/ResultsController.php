<?php

namespace App\Controllers;



class ResultsController extends BaseController
{

    private $resultsModel;
    public function __construct()
    {
        $this->resultsModel = model('App\Models\ResultsModel');
    }


    public function index()
    {

        if(!empty($_POST)){
            $postalCode = $_POST['postal_code_company'];
            $planning = $_POST['Horaire'];
            $enfant = $_POST['enfant'];
        }

        $createFile = $this->resultsModel->createJsonFile($postalCode, $enfant);
        $companyData = $this->resultsModel->getAllCompany();
        echo view('results/global_result', [
            'companyData' => $companyData
        ]);
    }

    public function singlePage($id){
        $single_company = $this->resultsModel->getCompanyById($id);
        echo view('results/single_result', [
            'single' => $single_company
        ]);
    }



}

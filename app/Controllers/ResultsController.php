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
        $createFile = $this->resultsModel->createJsonFile();
        $companyData = $this->resultsModel->getAllCompany();
        echo view('results/global_result', [
            'companyData' => $companyData
        ]);
    }


}

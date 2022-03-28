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
        echo view('results/global_result');
    }

    public function getApiResult(){
        $data = $this->resultsModel->getDataParseJson();
        echo view('api/api_company', [
            "jsonData" => $data,
        ]);
    }

}

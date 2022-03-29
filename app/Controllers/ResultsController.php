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
        $data = $this->resultsModel->getDataParseJson();
        echo view('results/global_result');
    }


}

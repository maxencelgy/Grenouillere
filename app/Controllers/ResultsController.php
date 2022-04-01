<?php

namespace App\Controllers;



class ResultsController extends BaseController
{

    private $resultsModel;
    public function __construct()
    {
        $this->resultsModel = model('App\Models\ResultsModel');
        $this->planningModel = model('App\Models\PlanningModel');
        $this->slotModel = model('App\Models\SlotModel');
        // findAllSlotByCompanyAndWeek
    }


    public function index()
    {

        if(!empty($_POST)){
            $postalCode = $_POST['postal_code_company'];
            $planning = $_POST['horaire'];
            $enfant = $_POST['enfant'];
            $day = $_POST['day'];
        }else{
            return redirect()->to('/');
        }

        $createFile = $this->resultsModel->createJsonFile($postalCode, $enfant, $planning, $day);
        $companyData = $this->resultsModel->getAllCompany();
        echo view('results/global_result', [
            'companyData' => $companyData
        ]);
    }

    public function singlePage($id){
        $single_company = $this->resultsModel->getCompanyById($id);
        $planning = $this->planningModel->getAll();
        $slot = $this->slotModel->findAllSlotByCompanyAndWeek(1, '2022-03-31');
        // var_dump($slot);    
        echo view('results/single_result', [
            'single' => $single_company,
            'planning' => $planning,
            'slot' => $slot
        ]);
    }



}
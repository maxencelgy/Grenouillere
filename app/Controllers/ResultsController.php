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
        $this->childModel = model('App\Models\ChildrenModel');
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
        // 
        $single_company = $this->resultsModel->getCompanyById($id);
        $chidrenList = $this->childModel->getAllIdNameChildByIdParent($id);
        $planning = $this->planningModel->getAll(); 
        // correspond à la redirection du bouton "envoyer le planning"
        $infoBtn = ['/reservation/ajouter/enfant','Envoyer le planning pour mon enfant'] ;          
        $slot = $this->slotModel->findAllSlotByCompanyAndWeek($id, date('Y-m-d'));
        echo view('results/single_result', [
            'single' => $single_company,
            'planning' => $planning,
            'slot' => $slot,
            'chidrenList' => $chidrenList,
            'infoBtn' => $infoBtn
        ]);
    }

    public function addReservation()
    {
        // TODO: verification si un enfant à été selectionné
        // TODO:verification du nombre d'enfant est posible a ajouter dans le slot (si le child_remaining_slot est inférieur 
        // au nombre d'enfant voulu, on ne peut pas ajouter)

        // TODO: boucle en fonction du nombre d'enfant selectionné
            // TODO: insertion dans la table reservation
            // TODO: Update table slot (child_remaining_slot --)
    }

}
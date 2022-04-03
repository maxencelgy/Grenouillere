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
        $planning = $this->planningModel->getAll(); 
        // On affiche la liste des enfants seulement si l'utilisateur est connecté
        $chidrenList = (!empty(session()->get('id'))) ? $this->childModel->getAllIdNameChildByIdParent(session()->get('id')) : [];
        // correspond à la redirection du bouton "envoyer le planning"
        $infoBtn = ['/reservation/ajouter/enfant','Reréserver'];          
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
        function debug($tableau)
        {
            echo '<pre style="height:500px;overflow-y: scroll;font-size: .7rem;padding: .6rem;font-family: Verdana;background-color: #000;color:#fff;">';
            print_r($tableau);
            echo '</pre>';
        }
        $idUser = session()->get('id');
        debug($_POST);
        var_dump(count($_POST));
        $a=0;   
        $b=0;   
        $newArray = [];
        // On trie les infos par un modulo de 5 pour faire les requètes
        for($i=0; $i<(count($_POST)/5); $i++){
            foreach($_POST['id_child_'.$i] as $child)
            {
                $newArray[$a]['id_users']    = $idUser;
                $newArray[$a]['id_child']    = $child;
                $newArray[$a]['date_slot']   = $_POST['date_slot_'.$i];
                $newArray[$a]['fk_planning'] = $_POST['fk_planning_'.$i];
                $newArray[$a]['id_slot']     = $_POST['id_slot_'.$i];
                $a++;
                $b++;
            }            
            if($i%5==0){
                if($b!==0){
                    //Pour avoir un bon incrément
                    $b = 0;
                }else{
                    $a++;
                }
                
            }
            
        }	
        debug($newArray);
        // On créer la facture


        // TODO: verification si un enfant à été selectionné
        // TODO:verification du nombre d'enfant est posible a ajouter dans le slot (si le child_remaining_slot est inférieur 
        // au nombre d'enfant voulu, on ne peut pas ajouter)

        // TODO: boucle en fonction du nombre d'enfant selectionné
            // TODO: insertion dans la table reservation
            // TODO: Update table slot (child_remaining_slot --)
    }

}
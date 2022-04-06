<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;

class ProfilController extends BaseController
{

    private $childrenModel;
    private $ChildAllergyModel;
    private $ChildDiseaseModel;
    private $reservationModel;
    private $profilModel;
    private $companyModel;
    public function __construct()
    {

        $this->childrenModel = model('App\Models\ChildrenModel');
        $this->companyModel = model('App\Models\CompanyModel');
        $this->allergyModel = model('App\Models\AllergyModel');
        $this->diseaseModel = model('App\Models\diseaseModel');
        $this->ChildAllergyModel = model('App\Models\ChildAllergyModel');
        $this->ChildDiseaseModel = model('App\Models\ChildDiseaseModel');
        $this->reservationModel = model('App\Models\reservationModel');
        $this->profilModel        = model('App\Models\profilModel');
        $this->planningModel      = model('App\Models\planningModel');
        $this->slotModel          = model('App\Models\slotModel');
        $this->factureModel          = model('App\Models\FactureModel');

    }

    public function index()
    {
        if(!empty(session()->get("role"))){
            $children = $this->childrenModel->getParentsChild();
            $allergy = $this->allergyModel->getAllAllergy();
            $disease = $this->diseaseModel->getAllDisease();
            $reservations = $this->reservationModel->getReservationsWithCompanyById(session()->get("id"));
            $idFacturePdf = $this->reservationModel->getAllUserFacture(session()->get("id")) ;
            $prixfacture = [];
            $hourlyRate ='';            
            if(!empty($idFacturePdf)){
                
                foreach ($idFacturePdf as $idFacture) {
                    // Si il y a des facture on affiche les prix, on lie un prix à une facture
                    // On le mets aussi dans boucle parce que les entreprises n'ont pas toutes  
                    // le même taux horraires.
                    $hourlyRate = $this->factureModel->getHourlyRate($idFacture['fk_facture'])[0]['hourly_rate_company'];
                    $prixfacture[$idFacture['fk_facture']] = $this->reservationModel->getCountFactures($idFacture['fk_facture'])*$hourlyRate;
                    
                }
            }
            echo view('profil/index', [
                "reservations" => $reservations,
                "childrens" => $children,
                "allergy" => $allergy,
                "disease" => $disease,
                "idFacturePdf" => $idFacturePdf,
                "prixfacture" => $prixfacture,
            ]);
        }else{
            return redirect()->to('/404');
        }
    }


    public function ProfilCompany($id)
    {
        if(!empty(session()->get("status_company"))) {
            $companyData = $this->companyModel->companyData($id);
            echo view('profil/profil_company', [
                "companyData" => $companyData
            ]);
        }else{
            return redirect()->to('/404');
        }
    }

    public function uploadFolder()
    {
        if(!empty($_FILES)){
            $random = random_int(100, 2000);
            $day = date("m_d_y");
            if(!empty($_FILES["rib_company"])){
                $tmp_name = $_FILES["rib_company"]["tmp_name"];
                $fileType = pathinfo($_FILES["rib_company"]["name"], PATHINFO_EXTENSION);

                $fileName = basename("rib_".$day.'_'.$random.'.'.$fileType);
                move_uploaded_file($tmp_name, "./upload/".$fileName);
                return $fileName;

            }
            elseif(!empty($_FILES["identity_company"])){
                $tmp_name = $_FILES["identity_company"]["tmp_name"];
                $fileType = pathinfo($_FILES["identity_company"]["name"], PATHINFO_EXTENSION);

                $fileName = basename("cni_".$day.'_'.$random.'.'.$fileType);
                move_uploaded_file($tmp_name, "./upload/".$fileName);
                return $fileName;
            }
            elseif(!empty($_FILES["certificate_company"])){
                $tmp_name = $_FILES["certificate_company"]["tmp_name"];
                $fileType = pathinfo($_FILES["certificate_company"]["name"], PATHINFO_EXTENSION);

                $fileName = basename("certif_".$day.'_'.$random.'.'.$fileType);
                move_uploaded_file($tmp_name, "./upload/".$fileName);
                return $fileName;
            }
            elseif(!empty($_FILES["licence_company"])){
                $tmp_name = $_FILES["licence_company"]["tmp_name"];
                $fileType = pathinfo($_FILES["licence_company"]["name"], PATHINFO_EXTENSION);

                $fileName = basename("licence_".$day.'_'.$random.'.'.$fileType);
                move_uploaded_file($tmp_name, "./upload/".$fileName);
                return $fileName;
            }
            elseif(!empty($_FILES["kbis_company"])){
                $tmp_name = $_FILES["kbis_company"]["tmp_name"];
                $fileType = pathinfo($_FILES["kbis_company"]["name"], PATHINFO_EXTENSION);

                $fileName = basename("kbis_".$day.'_'.$random.'.'.$fileType);
                move_uploaded_file($tmp_name, "./upload/".$fileName);
                return $fileName;
            }
        }else{
            return redirect()->to('/profil/compagny');
        }
    }

    public function updateFile($id)
    {
        if(!empty($_FILES)){
            $fileName = $this->uploadFolder();
            if(!empty($_FILES["rib_company"])){
                $this->companyModel->updateFolder($id, "rib_company" ,$fileName);
                return redirect()->to('/profil/compagny');
            }
            elseif(!empty($_FILES["identity_company"])){
                $this->companyModel->updateFolder($id, "cni_company" ,$fileName);
                return redirect()->to('/profil/compagny');
            }
            elseif(!empty($_FILES["certificate_company"])){
                $this->companyModel->updateFolder($id, "certificate_company" ,$fileName);
                return redirect()->to('/profil/compagny');
            }
            elseif(!empty($_FILES["licence_company"])){
                $this->companyModel->updateFolder($id, "licence_company" ,$fileName);
                return redirect()->to('/profil/compagny');
            }
            elseif(!empty($_FILES["kbis_company"])){
                $this->companyModel->updateFolder($id, "kbis_company" ,$fileName);
                return redirect()->to('/profil/compagny');
            }
        }
        else{
            return redirect()->to('/profil/compagny');
        }
    }

    public function companyModify($id)
    {
        $nom = $this->request->getPost("nom");
        $email = $this->request->getPost("email");
        $postal = $this->request->getPost("postal");
        $first_name = $this->request->getPost("first_name");
        $adress = $this->request->getPost("adress");
        $siret = $this->request->getPost("siret");
        $capacity = $this->request->getPost("capacity");
        $city = $this->request->getPost("city");
        $price = $this->request->getPost("price");

        $this->companyModel->updateCompany($id,
            $data = [
                'email_company' => $email,
                'name_company' => $nom,
                'postal_code_company' => $postal,
                'frist_name_company' => $first_name,
                'adress_company' => $adress,
                'siret_company' => $siret,
                'child_capacity_company	' => $capacity,
                'city_company' => $city,
                'hourly_rate_company' => $price,
                'status_company' => 'nouveau',
            ]);

        return redirect()->to('profil/compagny/'.session()->get("id"));
    }

    public function editCompany($id)
    {
        if(!empty(session()->get("status_company"))){
            $planning = $this->planningModel->getAll();
            $companyData = $this->companyModel->companyData($id);
            $infoBtn = ['/calendar/add','Envoyer le planning'] ;
            echo view('profil/edit_company', [
                "planning" => $planning,
                "infoBtn" => $infoBtn,
                "companyData" => $companyData
            ]);
        }else{
            return redirect()->to('/404');
        }
    }

    public function handlePostCalandar()
    {
        $data = [];
        $a = 0;
        $dataPost = array_values($this->request->getPost());
        for ($i = 0; $i < count($dataPost); $i++) {
            // On créer un tableau avec les données du post (via le JS)
            // on fait un modulo pour savoir si on est sur une date ou un planning
            // On ajoute les données en base de données à la fin du modulo, apres que le tableau aient toutes les infos
            if ($i % 2 == 0) {
                $data[$a]['fk_company'] = session()->get('id');
                $data[$a]['child_remaining_slot'] = session()->get('child_capacity_company');
                $data[$a]['date_slot'] = $dataPost[$i];
            } else {
                $data[$a]['fk_planning'] = $dataPost[$i];
                // verif que les données n'existe pas en déja en base de données
                $occurenceData = $this->slotModel->verifyOccurence($data[$a]['fk_planning'], $data[$a]['fk_company'], $data[$a]['date_slot']);
                // $occurenceData = false;
                if (!$occurenceData) {
                    $this->profilModel->insertCalendar($data[$a]);
                } else {
                    echo 'erreur donnée déja presentent en base !';
                }
                $a++;
            }
        }
    }
}
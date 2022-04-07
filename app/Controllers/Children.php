<?php

namespace App\Controllers;

class Children extends BaseController
{
    private $childrenModel;
    private $ChildAllergyModel;
    private $ChildDiseaseModel;
    public function __construct()
    {
        $this->childrenModel = model('App\Models\ChildrenModel');
        $this->allergyModel = model('App\Models\AllergyModel');
        $this->diseaseModel = model('App\Models\diseaseModel');
        $this->ChildAllergyModel = model('App\Models\ChildAllergyModel');
        $this->ChildDiseaseModel = model('App\Models\ChildDiseaseModel');
        $this->ChildReservationModel = model('App\Models\ReservationModel');
    }


    public function create()
    {
        $children = $this->childrenModel->getParentsChild();
        $allergy = $this->allergyModel->getAllAllergy();
        $disease = $this->diseaseModel->getAllDisease();
        echo view('children/add', [
            "childrens" => $children,
            "allergy" => $allergy,
            "disease" => $disease,
        ]);
    }


    public function handlePost()
    {
        $data = $this->generateChildrenFromPost($this->request);
        $this->childrenModel->insertChildren($data);
        $id_user = session()->get("id");
        return redirect()->to('profil/'.$id_user);
    }

    public function handlePostAllergyChild()
    {
        $data = $this->generateChildAllergyFromPost($this->request);
        $this->ChildAllergyModel->insertAllergyChild($data);
        return redirect()->to('/profil');
    }

    public function handlePostDiseaseChild()
    {
        $data = $this->generateChildDiseaseFromPost($this->request);
        $this->ChildDiseaseModel->insertDiseaseChild($data);
        return redirect()->to('/profil');
    }

    private function generateChildrenFromPost($request)
    {
        return [
            "fk_users" => session()->get("id"),
            "last_name_child" => $this->request->getPost("last_name_child"),
            "first_name_child" => $this->request->getPost("first_name_child"),
            "birthday_child" => $this->request->getPost("birthday_child"),
            "need_child" => $this->request->getPost("need_child"),
        ];
    }

    private function generateChildAllergyFromPost($request)
    {
        return [
            "fk_child" => $this->request->getPost("fk_child"),
            "fk_allergy" => $this->request->getPost("fk_allergy"),
            "description_allergy" => $this->request->getPost("description_allergy"),
        ];
    }

    private function generateChildDiseaseFromPost($request)
    {
        return [
            "fk_child" => $this->request->getPost("fk_child"),
            "fk_disease" => $this->request->getPost("fk_disease"),
            "description_child_disease" => $this->request->getPost("description_child_disease"),
        ];
    }

    public function handleModify(int $id_child)
    {
        $children = $this->childrenModel->find($id_child);
        if (is_null($children)) {
            return redirect()->to('/create-children');
        }
        echo view('children/modify', [
            "children" => $children
        ]);
    }

    public function handleModified()
    {
        $data = $this->generateChildrenFromPost($this->request);
        $this->childrenModel->update($this->request->getPost("id_child"), $data);
        return redirect()->to('/');
    }


    public function handleDelete($id_child)
    {
        $this->ChildAllergyModel->deleteById($id_child);
        $this->ChildDiseaseModel->deleteById($id_child);
        $this->ChildReservationModel->deleteById($id_child);
        $this->childrenModel->deleteById($id_child);
        $id_user = session()->get("id");
        return redirect()->to('profil/'.$id_user);
    }

}
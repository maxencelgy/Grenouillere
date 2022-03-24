<?php

namespace App\Controllers;

class Children extends BaseController
{
    private $childrenModel;
    public function __construct()
    {
        $this->childrenModel = model('App\Models\ChildrenModel');
    }


    public function create()
    {
        $children = $this->childrenModel->getParentsChild();
        echo view('children/add', [
            "childrens" => $children
        ]);
    }


    public function handlePost()
    {
        $data = $this->generateChildrenFromPost($this->request);
        $this->childrenModel->insertChildren($data);
        return redirect()->to('/create-children');
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

    public function handleModify(int $id_child)
    {
        var_dump($id_child);

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
        return redirect()->to('/create-children');
    }

    public function handleDelete(int $id_child)
    {
        $this->childrenModel->deleteById($id_child);
        return redirect()->to('/create-children');
    }

}
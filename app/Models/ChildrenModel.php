<?php

namespace App\Models;

use CodeIgniter\Model;

class ChildrenModel extends Model
{
    protected $table = 'child';
    protected $allowedFields = ['fk_users', 'last_name_child', 'first_name_child', 'birthday_child', 'need_child'];
    protected $primaryKey    = 'id_child';


    public function getAllChildrens()
    {
        return $this->findAll();
    }

    public function getParentsChild()
    {
        return $this->select('child.*')
            ->join('users', 'child.fk_users = users.id_users')
            ->where('child.fk_users =' . session()->get("id"))
            ->find();
    }

    public function getAllIdNameChildByIdParent(int $idParent)
    {
        return $this->select('id_child, first_name_child')
                    ->where('child.fk_users =' .$idParent)
                    ->find();
    }


    public function getOneChildrens($id)
    {
        return $this->find($id);
    }

    public function insertChildren(array $data)
    {
        return $this->insert($data);
    }

    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
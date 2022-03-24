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

    public function getOneChildrens($id)
    {
        return $this->find($id);
    }

    public function insertChildren(array $data)
    {
        return $this->insert($data);
    }

    public function deleteById(int $id)
    {
        return $this->delete($id);
    }
}
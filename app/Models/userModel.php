<?php

namespace App\Models;

use App\Controllers\AuthenticationController;
use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email_users' , 'last_name_users', 'first_name_users', 'password_users',
        'phone_users', 'role_users', 'city_users', 'postal_users', 'adress_users','token_users'];
    protected $primaryKey       = 'id_users';    

    public function insertUser(array $data)
    {
        return $this->insert($data);
    }

    public function getInfoUser(int $id)
    {
        return $this->select('*')
        ->where('id_users',$id)
        ->find();
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getIdFromToken($token){
        return $this->select('id_users')
        ->where('token_users=', $token)
        ->find()[0]["id_users"];
    }

}
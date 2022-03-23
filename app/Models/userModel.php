<?php

namespace App\Models;

use App\Controllers\AuthenticationController;
use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['last_name_users', 'first_name_users', 'phone_users', 'role_users', 'city_users',
        'postal_users', 'adress_users'];

    public function insertUser(array $data)
    {
        return $this->insert($data);
    }

}


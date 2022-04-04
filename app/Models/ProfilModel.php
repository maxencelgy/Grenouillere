<?php

namespace App\Models;

use App\Controllers\AuthenticationController;
use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'slot';
    protected $allowedFields = ['fk_planning', 'fk_company', 'date_slot', 'child_remaining_slot'];
    protected $primaryKey       = 'id_slot';

    public function insertUser(array $data)
    {
        return $this->insert($data);
    }

    public function insertCalendar(array $data)
    {
        return $this->insert($data);
    }
}

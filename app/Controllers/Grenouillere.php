<?php

namespace App\Controllers;

class Grenouillere extends BaseController
{
    private $planningModel;
    public function __construct()
    {
        $this->planningModel = model('App\Models\PlanningModel');
    }

    public function index()
    {
        $planning = $this->planningModel->getAll();
        echo view('grenouillere/index', [
            "planning" => $planning,
        ]);
    }

}
<?php

namespace App\Controllers;

class Grenouillere extends BaseController
{

    public function index()
    {
        echo view('grenouillere/index');
    }

    public function viewAuth()
    {
        echo view('authentication/auth');
    }

}

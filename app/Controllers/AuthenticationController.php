<?php

namespace App\Controllers;

class AuthenticationController extends BaseController
{

    public function viewAuth()
    {
        echo view('authentication/auth');
    }

}

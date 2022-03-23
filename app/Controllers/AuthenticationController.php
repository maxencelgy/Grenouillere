<?php

namespace App\Controllers;
use App\Models\userModel;
use CodeIgniter\HTTP\IncomingRequest;

class AuthenticationController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = model('App\Models\userModel');
    }

    private function generateUserFromPost(IncomingRequest $request): array
    {
        $data = [
            "last_name_users" => $request->getPost("last_name_users"),
            "first_name_users" => $request->getPost("first_name_users"),
            "phone_users" => $request->getPost("phone_users"),
            "role_users" => "user",
            "city_users" => $request->getPost("city_users"),
            "postal_users" => $request->getPost("postal_users"),
            "adress_users" => $request->getPost("adress_users"),
        ];
        return $data;
    }

    public function viewAuth()
    {
        echo view('authentication/auth');
    }

    public function handlePost()
    {
        $data = $this->generateUserFromPost($this->request);

        $val = $this->validate([
            "last_name_users" => 'trim|required|min_length[3]|max_length[100]',
            "first_name_users" => 'trim|required|min_length[3]|max_length[100]',
//            "phone_users" => 'integer|required|min_length[1]|max_length[2]',
//            "role_users" => 'integer|required|min_length[1]|max_length[2]',
//            "city_users" => 'integer|required|min_length[1]|max_length[2]',
//            "postal_users" => 'integer|required|min_length[1]|max_length[2]',
//            "adress_users" => 'integer|required|min_length[1]|max_length[2]',
        ]);

        if (!$val) {
            echo view('grenouillere/user_connection', [
                'validation' => $this->validator,
            ]);
        } else {
            $this->userModel->insertUser($data);
            return redirect()->to('/');
        }
    }
}

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
            "email_users" => $request->getPost("email_users"),
            "last_name_users" => $request->getPost("last_name_users"),
            "first_name_users" => $request->getPost("first_name_users"),
            "password_users" => password_hash($this->request->getPost('password_users'), PASSWORD_DEFAULT),
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

    public function registerUser()
    {
        $data = $this->generateUserFromPost($this->request);

        $val = $this->validate([
            "last_name_users"        => 'trim|required|min_length[3]|max_length[180]',
            "first_name_users"       => 'trim|required|min_length[3]|max_length[180]',
            "email_users"            => 'required|valid_email|is_unique[users.email_users]',
            "password_users"         => 'min_length[6]',
            "password_users_confirm" => 'required|matches[password_users]',
        ]);

        if (!$val) {
            echo view('grenouillere/user_register', [
                'validation' => $this->validator,
            ]);
        } else {
            $this->userModel->insertUser($data);
            return redirect()->to('/');
        }
    }

    public function loginUser(){
        $input = $this->validate([
            'password_users' => 'required',
            'email_users' => 'required|valid_email',
        ]);

        if ($input) {
            $user = $this->userModel->where(["email_users" => $this->request->getPost('email_users')])->first();

            if (!empty($user)) {
                if (password_verify($this->request->getPost('password_users'), $user["password_users"])) {
                    session()->set([
                        "id" => $user["id_users"],
                        "email" => $user["email_users"],
                    ]);
                    return redirect()->to('/');
                }
            }
        }

        echo view('grenouillere/user_connection', [
            'validation' => $this->validator
        ]);
    }

    public function logoutUser()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

<?php

namespace App\Controllers;
use App\Models\userModel;
use App\Models\CompanyModel;
use CodeIgniter\HTTP\IncomingRequest;

class AuthenticationController extends BaseController
{
    private $userModel;
    private $companyModel;

    public function __construct()
    {
        $this->userModel = model('App\Models\userModel');
        $this->companyModel = model('App\Models\CompanyModel');
    }

    public function viewAuth()
    {
        echo view('authentication/auth');
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
            echo view('authentication/users/register', [
                'validation' => $this->validator,
            ]);
        } else {
            $this->userModel->insertUser($data);
            return redirect()->to('authentication/users/login');
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

        echo view('authentication/users/login', [
            'validation' => $this->validator
        ]);
    }

    public function logoutUser()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    

    private function generateCompanyFromPost(IncomingRequest $request): array
    {
        $data = [
            'email_company'=> $request->getPost("email_company"),
            'name_company'=> $request->getPost("name_company"),
            'last_name_company'=> $request->getPost("last_name_company"),
            'frist_name_company'=> $request->getPost("frist_name_company"),
            'password_company'=> password_hash($this->request->getPost('password_company'), PASSWORD_DEFAULT),
            'status_company'=> "nouveau",
            'city_company'=> "Cormelles le Royal",
            'postal_code_company'=> "14123",
            'adress_company'=> "1 rue de la vallée",
            'x_company'=> "25",
            'y_company'=> "42",
            'siret_company'=> $request->getPost("siret_company"),
            'hourly_rate_company'=> $request->getPost("hourly_rate_company"),
            'child_capacity_company'=> $request->getPost("child_capacity_company"),
        ];
        return $data;
    }
 
    public function registerCompany()
    {
        $data = $this->generateCompanyFromPost($this->request);

        $val = $this->validate([
            'email_company'    => [
                'rules'  => 'trim|required|valid_email|is_unique[company.email_company]',
                'errors' => [
                    'required' => 'Veuillez rentrer un email',
                    'valid_email' => 'Votre mail n\'est pas valide',
                    'is_unique' => 'Cette email existe déjà en base',
                ],
            ],
            'name_company'    => [
                'rules'  => 'trim|required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'Veuillez rentrer un email',
                    'min_length' => 'Veuillez Saisir un nom d\'entreprise à plus de 3 caractère',
                    'max_length' => 'Veuillez Saisir un nom d\'entreprise à moins de 200 caractère',
                ],
            ],
            'last_name_company'    => [
                'rules'  => 'trim|required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'Veuillez rentrer un nom',
                    'min_length' => 'Veuillez Saisir un nom à plus de 3 caractère',
                    'max_length' => 'Veuillez Saisir un nom à moins de 200 caractère',
                ],
            ],
            'last_name_company'    => [
                'rules'  => 'trim|required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'Veuillez rentrer un nom',
                    'min_length' => 'Veuillez Saisir un nom à plus de 3 caractère',
                    'max_length' => 'Veuillez Saisir un nom à moins de 200 caractère',
                ],
            ],
            'password_company'    => [
                'rules'  => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Veuillez un mot de passe',
                    'min_length' => 'Veuillez Saisir un mots de passe à plus de 5 caractère',

                ],
            ],
            'password_company_confirmation'    => [
                'rules'  => 'trim|matches[password_company]',
                'errors' => [
                    'matches' => 'Mot de passe différents !',
                    
                ],
            ],
            'password_company_confirmation'    => [
                'rules'  => 'trim|matches[password_company]',
                'errors' => [
                    'matches' => 'Mot de passe différents !',
                    
                ],
            ],
            'siret_company'    => [
                'rules'  => 'trim|min_length[13]|max_length[13]|numeric',
                'errors' => [
                    'min_length' => 'Pas assez de caractères 13 requis',
                    'max_length' => 'Trop de caractères 13 requis',                    
                    'numeric' => 'Vous devez rentrer des nombres',                    
                ],
            ],
            'hourly_rate_company'    => [
                'rules'  => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Vous devez renter un taux horraire',
                    'numeric' => 'Vous devez rentrer un nombre',                    
                ],
            ],

            'cgu'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Veuillez accepter les CGU',
                ],
            ],            
        ]);
        if (!$val) {
            echo view('authentication/company/register', [
                'validation' => $this->validator,
            ]);
        } else {
            $this->companyModel->insertCompany($data);
            return redirect()->to('/entreprise/connexion');
        }
    }

    public function loginCompany(){
        $input = $this->validate([
            'email_company'    => [
                'rules'  => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Veuillez rentrer un email',
                    'valid_email' => 'Votre mail n\'est pas valide',
                ],
            ],
            'password_company'    => [
                'rules'  => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Veuillez un mot de passe',
                    'min_length' => 'Veuillez saisir un mots de passe à plus de 5 caractère',

                ],
            ],
        ]);

        if ($input) {
            $company = $this->companyModel->where(["email_company" => $this->request->getPost('email_company')])->first();

            if (!empty($company)) {
                if (password_verify($this->request->getPost('password_company'), $company["password_company"])) {
                    session()->set([
                        "id" => $company["id_company"],
                        "email" => $company["email_company"],
                        "name_company" => $company["name_company"],
                        "frist_name_company" => $company["frist_name_company"],
                        "last_name_company" => $company["last_name_company"],
                        "city_company" => $company["city_company"],
                        "postal_code_company" => $company["postal_code_company"],
                        "adress_company" => $company["adress_company"],
                        "x_company" => $company["x_company"],
                        "siret_company" => $company["siret_company"],
                        "rib_company" => $company["rib_company"],
                        "hourly_rate_company" => $company["hourly_rate_company"],
                        "child_capacity_company" => $company["child_capacity_company"],
                    ]);
                    return redirect()->to('/');
                }
            }
        }

        echo view('authentication/company/login', [
            'validation' => $this->validator
        ]);
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Stripe;

class StripeController extends BaseController
{

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        helper(["url"]);
        $this->resultsModel = model('App\Models\ResultsModel');
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function stripe($id)
    {
        if (session()->get("role") == "user") {
            $single_company = $this->resultsModel->getCompanyById($id);
            echo view('stripe/stripe', [
                'single' => $single_company
            ]);
        } else {
            return redirect()->to('/404');
        }
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function payment($id)
    {
        $single_company = $this->resultsModel->getCompanyById($id);
        Stripe\Stripe::setApiKey(STRIPE_SECRET);

        $stripe = Stripe\Charge::create([

            "amount" => $single_company->hourly_rate_company * 100,
            "currency" => "eur",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Paiement à $single_company->name_company"
        ]);

        // after successfull payment, you can store payment related information into 
        // your database

        // $data = array('success' => true, 'data' => $stripe);
        // echo json_encode($data);

        session()->setFlashdata("message", "Paiement réussi");

        return redirect('/');
    }
}

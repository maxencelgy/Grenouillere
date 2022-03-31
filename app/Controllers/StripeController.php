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
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function stripe($id)
    {
        if (session()->get("role") == "user") {
            echo view("stripe/stripe");
        } else {
            return redirect()->to('/404');
        }
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function payment()
    {

        Stripe\Stripe::setApiKey(STRIPE_SECRET);

        $stripe = Stripe\Charge::create([
            "amount" => 70 * 100,
            "currency" => "eur",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Paiement à Maxence"
        ]);

        // after successfull payment, you can store payment related information into 
        // your database

        // $data = array('success' => true, 'data' => $stripe);
        // echo json_encode($data);

        session()->setFlashdata("message", "Paiement réussi");

        return redirect('stripe');
    }
}

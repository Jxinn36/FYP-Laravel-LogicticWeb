<?php

namespace App\Http\Controllers; 

use Illuminate\Support\Facades\Session;

class checkoutController extends Controller
{
    public function processCheckout()
    {
        // Perform checkout logic

        // Set a session variable to indicate that the wallet modal should be opened
        Session::put('openWalletModal', true);

        // Continue with the rest of your logic
        // ...

        return view('Checkout'); // Return the checkout view
    }
}

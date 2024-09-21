<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        // Logic for the checkout page
        return view('frontend.checkout');  // This refers to the Blade view file
    }
}


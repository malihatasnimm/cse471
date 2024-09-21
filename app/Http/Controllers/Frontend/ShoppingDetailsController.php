<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ShoppingDetailsController extends Controller
{
    public function index()
    {
        // Logic for the shopping details page
        return view('frontend.shop-details');  // This refers to the Blade view
    }
}

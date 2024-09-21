<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ShopGridController extends Controller
{
    public function index()
    {
        // Logic for the shop grid page
        return view('frontend.shop-grid');  // This refers to the Blade view file
    }
}

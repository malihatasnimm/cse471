<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BlogDetailsController extends Controller
{
    public function index()
    {
        // Logic for the blog details page
        return view('frontend.blog-details');  // This refers to the Blade view file
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email'
        ]);

        // Create a new subscription
        Subscription::create([
            'email' => $request->email
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}

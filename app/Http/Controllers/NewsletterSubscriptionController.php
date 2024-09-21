<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscription;

class NewsletterSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions'
        ]);

        // Store email in database
        NewsletterSubscription::create([
            'email' => $request->email
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}


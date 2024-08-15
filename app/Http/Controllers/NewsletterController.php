<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber;
use App\Mail\SubscriptionConfirmation;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);
       // dd("hello");
        // Save the subscriber's email to the database
        $subscriber = Subscriber::create([
            'email' => $request->email,
        ]);

       // dd(' Send a confirmation email');
       
       Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber));

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}

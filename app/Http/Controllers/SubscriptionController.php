<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SubscriptionController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
       // dd($request->all());
        // Set your Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Determine the plan and amount from the request
        $plan = $request->input('plan');
       // dd($plan);
        $amount = $request->input('amount'); // Amount in EUR

        // Create a new Checkout Session for the selected plan
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => ucfirst($plan) . ' Subscription',
                    ],
                    'unit_amount' => $amount * 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('subscription.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('subscription.cancel'),
            'metadata' => [
            'plan' => $plan, // Pass the plan name as metadata
        ],
        ]);

        // Redirect the user to the Stripe Checkout page
        return redirect($session->url, 303);
    }

    public function success(Request $request)
    {
        $session_id = $request->input('session_id');
        //dd($session_id);
        if (!$session_id) {
            
            return redirect()->route('home')->with('error', 'Session ID not found. Payment verification failed.');
        }
    
        Stripe::setApiKey(config('services.stripe.secret'));
    
       // try {
            $session = \Stripe\Checkout\Session::retrieve($session_id);

            $user = auth()->user();
            $user_id = auth()->id();

        //  dd($session);
            switch ($session->metadata->plan) {
                case 'Silver Account monthly':
                    $business_limit = 5;
                    break;
                case 'Silver Account yearly':
                    $business_limit = 50; // Set limit for Silver plan
                    break;
                case 'Pro Account monthly':
                    $business_limit = 12;
                    break;
                case 'Pro Account yearly':
                    $business_limit = PHP_INT_MAX; // Unlimited for Pro plan
                    break;
                default:
                    $business_limit = 1; // Default for free users
                    break;
            }
    
            // Update the user's business_limit
            $user->update(['business_limit' => $business_limit]);

            // Create a new subscription record in the database
            Subscription::create([
                'user_id' => $user_id,
                'plan' => $session->metadata->plan ?? 'default_plan', // Store the plan name (you can pass this via metadata)
                'amount' => $session->amount_total / 100, // Convert back to the main currency unit
                'currency' => $session->currency,
                'status' => $session->payment_status, // Store the payment status
            ]);
    
            return view('subscription.success'); // Show a success message to the user
    
        //} catch (\Exception $e) {
          //  return redirect()->route('home')->with('error', 'Payment verification failed: ' . $e->getMessage());
       // }
    }
    

    public function cancel()
    {
        // Handle the case when the user cancels the payment
        return view('subscription.cancel'); // Show a cancellation message to the user
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('subscribers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email,
        ]);

        Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber));

        return redirect()->route('subscribers.index')->with('success', 'Subscriber added successfully!');
    }
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email,
        ]);

        Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber));

        return response()->json(['success' => 'Subscriber added successfully!']);
    }

    public function edit(Subscriber $subscriber)
    {
        return view('subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, Subscriber $subscriber)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email,' . $subscriber->id,
        ]);

        $subscriber->update([
            'email' => $request->email,
        ]);

        return redirect()->route('subscribers.index')->with('success', 'Subscriber updated successfully!');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('subscribers.index')->with('success', 'Subscriber deleted successfully!');
    }
}

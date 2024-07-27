<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    public function showLockScreen()
    {
        return view('auth.lock-screen');
    }

    public function unlockScreen(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            // Remove lock status from session
            session()->forget('lock-screen');
            return redirect()->intended('/home');
        }

        return back()->withErrors(['password' => 'Password is incorrect']);
    }

    public function lockScreen()
    {
        session(['lock-screen' => true]);
        //sdd(session()->all());
        return redirect()->route('lock-screen');
    }
}

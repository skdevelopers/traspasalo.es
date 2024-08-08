<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Exception;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function showStep1()
    {
        return view('auth.register-step1');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ]);

        Session::put('registration', $request->only('first_name', 'last_name', 'email'));

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        if (!Session::has('registration')) {
            return redirect()->route('register.step1');
        }

        return view('auth.register-step2');
    }

    public function postStep2(Request $request)
    {
        
        //dd($request->all());
        $request->validate([
            'mobile_number' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);
        try {
        $registrationData = Session::get('registration');
        $registrationData['mobile_number'] = $request->mobile_number;
        $registrationData['password'] = hash::make($request->password);

        // Save the user data to the database
        $user = User::create($registrationData);

        event(new Registered($user));
        // Log the user in
        Auth::login($user);

        // Clear the session
        Session::forget('registration');

        return redirect(RouteServiceProvider::HOME);
     } catch (Exception $e) {
        // Log the error or handle it as needed
        return redirect()->route('register.step2')->with('error', 'An error occurred while processing your registration. Please try again.');
    }
        //$roles = Role::findOrFail(2);
        
    }
    public function index()
    {
        $users = User::with('roles')->get(); 
        // Use 'roles' instead of 'role'
        //dd($users);
        return view('users.index', compact('users'));
    }
    

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        dd($request->all());
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name', // Ensure each role exists in the roles table
        ]);
        
        $user->syncRoles($request->roles);
    
        return redirect()->route('users.index')->with('success', 'User updated and roles assigned successfully');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    //event(new Registered($user));
}

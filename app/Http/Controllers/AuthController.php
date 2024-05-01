<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('Authentification.Inscrire');
    }

    public function store()
    {
        $validated = request()->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|min:3|max:40',
            'prenom' => 'required|min:3|max:40',
            'civilite' => 'required|in:M,Mme,Mlle',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adresse' => 'required|min:5|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' => 'min:3',
            'state' => 'min:3',
        ]);

        $photoPath = request('photo')->store('photos', 'public');
        User::create(
            [
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'name' => $validated['name'],
                'prenom' => $validated['prenom'],
                'civilite' => $validated['civilite'],
                'tel' => $validated['tel'],
                'adresse' => $validated['adresse'],
                'photo' => $photoPath,
                'state'=>'state',
                'city' =>'city',
            ]
        );
        return redirect()->route('home')->with('success', 'Account created Successefully!');
    }

    public function login()
    {
        return view('Authentification.Seconnecter');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('home')->with('success','Logged in successfully!');
        }

        return redirect()->route('Seconnect')->withErrors([
            'email'=>"No matching user found with the provided email and password"
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('success','Logged out successfully!');
    }

}

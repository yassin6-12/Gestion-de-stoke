<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Authentification.liste', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('ListeEmployes')->with('success', 'Utilisateur supprimé avec succès');
    }
    public function update( User $user,Request $request,)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'tel' => 'required|string|max:15',
        'adresse' => 'required|string|max:255',
        'type_user' => 'required|string',
        'civilite' => 'required|string',
    ]);

    $user->update([
        'name' => $request->name,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'tel' => $request->tel,
        'adresse' => $request->adresse,
        'type_user' => $request->type_user,
        'civilite' => $request->civilite,
    ]);

    return redirect()->back()->with('success', 'Utilisateur mis à jour avec succès.');
}

    public function register()
    {
        return view('Authentification.Inscrire');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|min:3|max:40',
            'prenom' => 'required|min:3|max:40',
            'civilite' => 'required|in:M,Mme,Mlle',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adresse' => 'required|min:5|max:255',
            'type_user'  => 'required|in:admin,gestionaire,client',
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
                'type_user'=> $validated['type_user']
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

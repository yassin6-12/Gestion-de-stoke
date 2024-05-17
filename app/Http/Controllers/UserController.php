<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(User $user)
    {
        return view('Setting', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        // Validation des données de profil
        $validated = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'nullable|email|max:255',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adresse' => 'required|min:5|max:255',
            'password' => 'nullable|min:8',
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'zipcode' => 'required|min:3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour la photo
        ]);

        // Mise à jour de la photo de profil si une nouvelle photo est téléchargée
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            // Stocker la nouvelle photo
            $imagePath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $imagePath;
        }

        // Mise à jour des autres informations de l'utilisateur
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        $user->fill($validated);
        $user->save();


         return redirect()->route('Profile');
    }

    public function profile()
    {
        return view('Profile');
    }
}

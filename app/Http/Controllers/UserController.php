<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Request $request)
    {
        return view('Setting', compact('request'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(User $user)
    {
        $validated=request()->validate(
        [
            'name'=>'required|min:3|max:40',
            'email'=> 'nullable|min:1|max:255',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adresse' => 'required|min:5|max:255',
            'password' => 'required|min:8',
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'zipcode' => 'required|min:3',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request()->has('photo')){
            $imagePath=request()->file('photo')->store('photos','public');
            $validated['photo']=$imagePath;
            Storage::disk('public')->delete($user->image);
        }

        $user->update($validated);
        return redirect()->route('Profile');
    }



    public function profile()
    {
        return view('Profile');
    }
}


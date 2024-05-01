<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        ]);
        if(request()->has('photo')){
            $imagePath=request()->file('photo')->store('photos','public');
            $validated['photo']=$imagePath;
            Storage::disk('public')->delete($user->image);
        }
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'password' => $request->password,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode
        ]);
        $user->update($validated);
        $user->save();
        return redirect()->route('Profile');
    }



    public function profile()
    {
        return view('Profile');
    }
}


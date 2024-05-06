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

    public function showClient(){
        $clients = User::where('type_user','client')->get();
        return view('/admin.clientele.liste',['clients'=>$clients]);
    }
    public function updateClient($userid,Request $request){

        $user = User::findOrFail($userid);

        $validated=request()->validate(
        [
            'email' => 'required|email|unique:users,email,'.$userid,
            'name' => 'required|min:3|max:40',
            'prenom' => 'required|min:3|max:40',
            'civilite' => 'required|in:M,Mme,Mlle',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adresse' => 'required|min:5|max:255',
        ]);
        $user->update([
            'email'     => $request->input('email'),
            'name'      => $request->input('name'),
            'prenom'    => $request->input('prenom'),
            'civilite'  => $request->input('civilite'),
            'tel'       => $request->input('tel'),
            'adresse'   => $request->input('adresse'),
            'password'  => empty($request->input('password'))?$user->password:$request->input('password')
        ]);
        $user->save();
        return to_route('ListeClient');
    }

    public function destroyClient($userid,Request $request){
        $client = User::findOrFail($userid);
        $client->delete();
        return to_route('ListeClient');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        // if(request()->has('photo')){
        //     $imagePath=request()->file('photo')->store('photos','public');
        //     $validated['photo']=$imagePath;
        //     Storage::disk('public')->delete($user->image);
        //     $user->fill([
        //         'photo' => $request->zipcode
        //     ]);
        //     $user->save();
        //     return redirect()->route('Profile');
        // }
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
        $user->fill($validated);
        $user->save();
        return redirect()->route('Profile');
    }



    public function profile()
    {
        return view('Profile');
    }
}


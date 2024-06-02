<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class AuthClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('/client.profile', compact('clients'));
    }

    public function login()
    {
        return view('client.profile.login');
    }
}

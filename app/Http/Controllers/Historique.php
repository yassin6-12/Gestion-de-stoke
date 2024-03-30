<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Historique extends Controller
{
    public function index(){
        return view('Historique des commandes');
       }
}

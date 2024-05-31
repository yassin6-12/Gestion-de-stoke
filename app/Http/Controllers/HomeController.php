<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $productdata=produit::all()->count();
        // dd($productdata);
        return view('home');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;
class StockController extends Controller
{
    public function index()
    {
        // Fetch all products along with their categories
        $produits = produit::with('categorie')->get();
        return view('admin.stocks.liste', compact('produits'));
    }
}

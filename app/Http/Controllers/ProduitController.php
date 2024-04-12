<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\view;
use App\Http\Controllers\save;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('produit.index');
    }

    public function index2()
    {
        return view('Produit.produit');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $produit = new Produit();
        $produit->nom = $request->input('product_name');
        $produit->prix = $request->input('product_price');
        $produit->description = $request->input('product_description');
        $produit->save();
        return redirect()->Route('produit.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return view('SupprimerProduit');
    }
}

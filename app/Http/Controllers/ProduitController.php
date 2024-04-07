<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\view;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produit.Liste');
    }
    public function index2()
    {
        return view('produit.produit');
    }

    // public function panier()
    // {
    //     return view('produit.Panier');
    // }


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
    public function store(Request $request)
    {
        //
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

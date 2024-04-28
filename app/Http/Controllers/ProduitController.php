<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\view;
use App\Http\Controllers\save;
use App\Models\Categorie;
use Illuminate\Validation\Rule;

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

    // public function panier()
    // {
    //     return view('produit.Panier');
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produit.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {

        // validation of input fields
        request()->validate([
            'product_name'=>['required','min:3'],
            'product_price'=>['required'],
            'produit_stock_qt'=>['required'],
            'produit_min_qt'    =>['required'],
            'category_of_produit'=>[Rule::notIn('0')],
        ]);

        $produit = new Produit();
        $produit->nom           = $request->input('product_name');
        $produit->prix          = $request->input('product_price');
        $produit->description   = $request->input('product_description');
        $produit->qte_stock     = $request->input('produit_stock_qt');
        $produit->qte_min       = $request->input('produit_min_qt');
        $produit->categorie_id  = $request->input('category_of_produit');
        $produit->save();
        return to_route('produit.index'); 
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

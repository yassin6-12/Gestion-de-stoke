<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\view;

class CatégorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('catégorie.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catégorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$cat= $request->input('categorie_name');
        dd($cat );*/
        
        $categorie = new Categorie();
        $categorie->nom = $request->input('categorie_name');
        $categorie->save(); 
        return redirect() -> Route('catégorie.index');
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
        $categorie= categorie::find($id);
        return view('catégorie.edit' ,['cat'=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = categorie::find($id);
        $categorie->id = $request -> input('categorie_Id');
        $categorie->nom = $request -> input('categorie_name');
        $categorie -> save();
        return  redirect() -> Route('catégorie.index') -> with('success','categorie a jour ') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
       $categorie = categorie::find($id);
       $categorie -> delete();
  
       return redirect() -> Route('catégorie.index') -> with('success', 'catégorie supprimer avec succèss');  
    }
}

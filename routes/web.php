<?php


use App\Http\Controllers\CatégorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('home');
});
//produits
Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/produit.Liste', [ProduitController::class,'index'])->name('produit.list');
Route::get('/produit.Ajouter',[ProduitController::class,'create'])->name('Produit.ajouter');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');

// categories
Route::get('/catégorie.Liste',[CatégorieController::class,'index'])->name('Catégorie.liste');
Route::get('/catégorie.Ajouter',[CatégorieController::class,'create'])->name('Catégorie.ajouter');

//home
Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');
Route::get('/Setting',[ProfileController::class,'update'])->name('Setting');

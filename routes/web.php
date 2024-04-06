<?php


use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});
//produits
Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/produit.Liste', [ProduitController::class,'index'])->name('produit.liste');
Route::get('/produit.create',[ProduitController::class,'create'])->name('Produit.ajouter');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');

// categories
// Route::get('/catégorie.index',[CatégorieController::class,'index'])->name('Catégorie.index');
// Route::get('/catégorie.create',[CatégorieController::class,'create'])->name('catégorie.create');

Route::resource('catégorie','CatégorieController');

//home
Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');
Route::get('/Setting',[ProfileController::class,'update'])->name('Setting');

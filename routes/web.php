<?php


use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});
//produits
Route::get('/produit.Panier', function () {
    return view('/produit.Panier');
})->name('panier');
Route::get('/produit.facture', function () {
    return view('/produit.facture');
})->name('facture');

Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
// Route::get('/produit.Panier',[ProduitController::class,'panier'])->name('panier');
Route::get('/produit.Liste', [ProduitController::class,'index'])->name('produit.liste');
Route::get('/produit.create',[ProduitController::class,'create'])->name('produit.ajouter');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');

// categories
Route::get('/catégorie.index',[CatégorieController::class,'index'])->name('catégorie.index');
Route::get('/catégorie.create',[CatégorieController::class,'create'])->name('catégorie.create');

// Route::resource('catégorie',CatégorieController::class);

//home
Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');
Route::get('/Setting',[ProfileController::class,'update'])->name('Setting');

//---------------------------------Authentification-----------------------------------
Route::get('/Authentification.Seconnecter', function () {
    return view('Authentification.Seconnecter');
})->name('Seconnecter');
Route::post('/Authentification.Inscrire', function () {
    return view('Authentification.Inscrire');
})->name('S’inscrire');

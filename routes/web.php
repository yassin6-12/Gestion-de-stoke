<?php


use App\Http\Controllers\CatégorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('home');
});
//---------------------------------Produit-----------------------------------
Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/produit.Liste', [ProduitController::class,'index'])->name('produit.liste');
Route::get('/produit.Ajouter',[ProduitController::class,'create'])->name('produit.ajouter');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');
Route::get('/produit.Panier', function () {
    return view('produit.Panier');
})->name('produit.Panier');
Route::get('/produit.Facture', function () {
    return view('produit.Facture');
})->name('produit.facture');

//---------------------------------Catégorie-----------------------------------
Route::get('/catégorie.Liste',[CatégorieController::class,'index'])->name('catégorie.liste');
Route::get('/catégorie.Ajouter',[CatégorieController::class,'create'])->name('catégorie.ajouter');

Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');

Route::get('/Setting', function () {
    return view('Setting');
})->name('Setting');
//---------------------------------Authentification-----------------------------------
Route::get('/Authentification.Seconnecter', function () {
    return view('Authentification.Seconnecter');
})->name('Seconnecter');
Route::get('/Authentification.Inscrire', function () {
    return view('Authentification.Inscrire');
})->name('S’inscrire');




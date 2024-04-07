<?php


use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});
//---------------------------------Produit-----------------------------------
Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/produit.Liste', [ProduitController::class,'index'])->name('produit.list');
Route::get('/produit.Ajouter',[ProduitController::class,'create'])->name('Produit.ajouter');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');

// categories
Route::get('/catégorie.Liste',[CatégorieController::class,'index'])->name('Catégorie.liste');
Route::get('/catégorie.Ajouter',[CatégorieController::class,'create'])->name('Catégorie.ajouter');

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




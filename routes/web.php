<?php


use App\Http\Controllers\CatégorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('home');
});
Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/produit.Liste', [ProduitController::class,'index'])->name('ListeProduit');
Route::get('/produit.Ajouter',[ProduitController::class,'create'])->name('AjouterProduit');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');
Route::get('/catégorie.Liste',[CatégorieController::class,'index'])->name('ListeCatégorie');
Route::get('/catégorie.Ajouter',[CatégorieController::class,'create'])->name('AjouterCatégorie');
Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');

Route::get('/Setting', function () {
    return view('Setting');
})->name('Setting');

Route::get('/Authentification.Seconnecter', function () {
    return view('Authentification.Seconnecter');
})->name('Seconnecter');

Route::get('/produit.Panier', function () {
    return view('produit.Panier');
})->name('Panier');

Route::get('/produit.Facture', function () {
    return view('produit.Facture');
})->name('facture');
<?php


use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});
//produits
Route::get('/Produit.produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/produit.index', [ProduitController::class,'index'])->name('produit.index');
Route::get('/produit.create',[ProduitController::class,'create'])->name('Produit.create');
Route::post('/produit.store',[ProduitController::class,'store'])->name('Produit.store');
// panier
Route::get('/produit.Panier', function () {
    return view('/produit.Panier');
})->name('panier');
Route::get('/produit.facture', function () {
    return view('/produit.facture');
})->name('facture');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');

// categories
Route::get('/catégorie.index', [CatégorieController::class,'index'])->name('catégorie.index');
Route::get('/catégorie.create',[CatégorieController::class,'create'])->name('catégorie.create');
Route::get('/catégorie.edit/{id}',[CatégorieController::class,'edit'])->name('catégorie.edit');
Route::post('/catégorie.update/{id}',[CatégorieController::class,'update'])->name('catégorie.update');
Route::post('/catégorie.store',[CatégorieController::class,'store'])->name('catégorie.store');
Route::delete('/catégorie/destroy/{id}',[CatégorieController::class,'destroy'])->name('catégorie.destroy');

// Route::resource('catégories',CatégorieController);

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

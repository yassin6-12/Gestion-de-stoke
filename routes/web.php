<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('home');
})->name('home');
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
Route::get('/Profile',[ProfilesController::class,'edit'])->name('Profile');
Route::get('/Setting',[ProfilesController::class,'update'])->name('Setting');
Route::post('/Setting',[ProfilesController::class,'update']);

//---------------------------------Authentification-----------------------------------
Route::get('/Authentification.Inscrire', [AuthController::class , 'register'])->name('Inscription');

Route::post('/Authentification.Inscrire', [AuthController::class , 'store']);

Route::get('/Authentification.Seconnecter', [AuthController::class ,'login'])->name('Seconnect');

Route::post('/Authentification.Seconnecter', [AuthController::class ,'authenticate']);

Route::post('/logout', [AuthController::class ,'logout'])->name('logout');



// Route::get('/', function () {
//     return view('profilehome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//require __DIR__.'/auth.php';

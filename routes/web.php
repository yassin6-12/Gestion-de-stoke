<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('home');
})->name('home');
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
Route::get('/Profile',[UserController::class,'profile'])->name('Profile');
Route::put('/Setting',[UserController::class,'update'])->name('SettingUpdate');
Route::get('/Setting',[UserController::class,'edit'])->name('SettingShow');
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

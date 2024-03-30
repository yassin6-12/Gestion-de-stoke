<?php


use App\Http\Controllers\CatégorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('home');
});
Route::get('/Produit', [ProduitController::class,'index2'])->name('Produit');
Route::get('/ListeProduit', [ProduitController::class,'index'])->name('ListeProduit');
Route::get('/AjouterProduit',[ProduitController::class,'create'])->name('AjouterProduit');
// Route::delete('/SupprimerProduit/{id}',[ProduitController::class,'destroy'])->name('SupprimerProduit');
Route::get('/ListeCatégorie',[CatégorieController::class,'index'])->name('ListeCatégorie');
Route::get('/AjouterCatégorie',[CatégorieController::class,'create'])->name('AjouterCatégorie');
Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');
Route::get('/Setting',[ProfileController::class,'update'])->name('Setting');

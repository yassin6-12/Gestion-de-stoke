<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatégorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientSideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RetourProduitController;
use App\Http\Controllers\stocksretourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
use App\Models\Client;
use App\Models\produit;
use App\Models\Vente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;


Route::get('/', [HomeController::class,'Home'])->name('home');
//produits
Route::get('/admin/produit', [ProduitController::class,'index'])->name('produit.index');
Route::get('/admin/produit/create',[ProduitController::class,'create'])->name('Produit.create');
Route::get('/admin/produit/{cat}/',[ProduitController::class,'show'])->name('Produit.show');
Route::post('/admin/produit',[ProduitController::class,'store'])->name('Produit.store');
Route::get('/admin/produit.edite', [ProduitController::class,'showProducts'])->name('EditeProduit');
Route::put('/admin/products/{id}', [ProduitController::class,'updateProduct'])->name('products.update');
Route::delete('/admin/products/{id}', [ProduitController::class,'destroyProduct'])->name('products.destroy');
Route::get('/admin/produit.ventes',[ProduitController::class,'ventes'])->name('produit.ventes');
Route::get('/admin/produit.ventes/{produit}',[ProduitController::class,'venteDetails'])->name('produit.venteDetails');
Route::get('/admin/produit.edite', [ProduitController::class, 'showProducts'])->name('EditeProduit');
Route::put('/admin/products/{id}', [ProduitController::class, 'updateProduct'])->name('products.update');
Route::delete('/admin/products/{id}', [ProduitController::class, 'destroyProduct'])->name('products.destroy');
Route::get('/admin/produit.ventes',[ProduitController::class,'ventes'])->name('produit.ventes');
Route::get('/admin/produit.ventes/{produit}',[ProduitController::class,'venteDetails'])->name('produit.venteDetails');

// panier
Route::get('/admin/produit.Panier',[VenteController::class,'panier'])->name('panier');
Route::post('/admin/produit.facture',[VenteController::class,'facture'])->name('facture');
Route::post('/admin/produit.Dfacture',[VenteController::class,'dfacture'])->name('dfacture');

// categories
Route::get('/catégorie', [CatégorieController::class,'index'])->name('catégorie.index');
Route::get('/catégorie/create',[CatégorieController::class,'create'])->name('catégorie.create');
Route::get('/catégorie/{cat}/edit',[CatégorieController::class,'edit'])->name('catégorie.edit');
Route::put('/catégorie/{cat}',[CatégorieController::class,'update'])->name('catégorie.update');
Route::post('/catégorie',[CatégorieController::class,'store'])->name('catégorie.store');
Route::delete('/catégorie/{id}',[CatégorieController::class,'destroy'])->name('catégorie.destroy');

// Route::resource('catégories',CatégorieController);

//home
Route::get('/Profile',[UserController::class,'profile'])->name('Profile');
Route::put('/Setting',[UserController::class,'update'])->name('SettingUpdate');
Route::get('/Setting',[UserController::class,'show'])->name('SettingShow');
//---------------------------------Authentification-----------------------------------
Route::get('/Authentification.Inscrire', [AuthController::class , 'register'])->name('Inscription');

Route::post('/Authentification.Inscrire', [AuthController::class , 'store'])->name('Inscription.new');

Route::get('/Authentification.Seconnecter', [AuthController::class ,'login'])->name('Seconnect');

Route::post('/Authentification.Seconnecter', [AuthController::class ,'authenticate']);

Route::post('/logout', [AuthController::class ,'logout'])->name('logout');

Route::get('/Authentification.liste', [AuthController::class, 'index'])->name('ListeEmployes');

Route::resource('users', AuthController::class);

Route::put('/users/{user}', [AuthController::class, 'update'])->name('users.update');

//----------------------Touts les Route du client----------------------
Route::get('/client.index', [ClientSideController::class,'index'])->name('electro.index');
// show products
Route::get('/client.product/{product}', [ClientSideController::class,'show'])->name('electro.show');
// show all categories
Route::get('/client.stores', [ClientSideController::class,'showCat'])->name('electro.stores');
// Authentication profile client
Route::get('/client.profile',[AuthClientController::class,'index'])->name('client.profile');

Route::get('/client.profile.login', [AuthClientController::class ,'login'])->name('client.connect');

// Route::middleware('auth:client')->get('/client.profile', 'AuthClientController@index');
Route::middleware('guest:client')->group(function () {
    Route::view('/client/login', 'auth.client_login')->name('client.login');
    Route::post('/client/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
});
// header
Route::get('/client.layouts.header',[ClientSideController::class,'header'])->name('electro.header');

//---------------------Route pour clientele-------------------

Route::get('/admin.clientele.liste',[ClientController::class,'index'])->name('clientele.index');
Route::post('/admin.clientele.liste',[ClientController::class,'store'])->name('clientele.store');
Route::put('/admin.clientele.liste/{client}',[ClientController::class,'update'])->name('clientele.update');
Route::delete('/admin.clientele.liste/{client}',[ClientController::class,'destroy'])->name('clientele.destroy');
Route::get('/admin.clientele.historique',[ClientController::class,'index2'])->name('historique');
Route::get('/admin.clientele.show/{id}/show', [ClientController::class, 'showAchats'])->name('showachats');

// Route::get('/admin.clientele.show', function () {
//     return view('/admin.clientele.show');
// })->name('showachats');
Route::get('/admin.stocks.liste',[StockController::class,'index'])->name('StocksListe');
Route::get('/admin.stocks.retour',[stocksretourController::class,'index'])->name('StocksRetour');
Route::post('/admin.stocks.retour',[stocksretourController::class,'store'])->name('StocksRetour.store');
Route::put('/admin.stocks.retour/{product}',[stocksretourController::class,'update'])->name('StocksRetour.update');
Route::delete('admin.stocks.retour/{product}',[stocksretourController::class,'destroy'])->name('StocksRetour.destroy');

Route::get('/admin.stocks.getCustomers',[ClientController::class,'getCustomers'])->name('getCustomers');
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

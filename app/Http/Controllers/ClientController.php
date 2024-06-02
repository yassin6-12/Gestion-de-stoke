<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\LigneVente;
class ClientController extends Controller
{
    public function showAchats($clientId)
    {
        $client = Client::findOrFail($clientId);
        $achats = LigneVente::join('ventes', 'ligne_ventes.id_vente', '=', 'ventes.id')
            ->join('produits', 'ligne_ventes.id_produit', '=', 'produits.id')
            ->join('categories', 'produits.categorie_id', '=', 'categories.id')
            ->where('ventes.id_client', $clientId)
            ->select(
                'ligne_ventes.id',
                'produits.nom as produit_nom',
                'categories.nom as categorie_nom',
                'ligne_ventes.created_at as date_achat',
                'ligne_ventes.prix',
                'produits.images'
            )
            ->get();

        return view('/admin.clientele.show', compact('achats','client'));
    }

    public function index2(){
        $clients = Client::all();
        return view('/admin.clientele.historique',['clients'=>$clients]);
    }
    public function index(){
        $clients = Client::all();
        return view('/admin.clientele.liste',['clients'=>$clients]);
    }

    public function store(){

        $validated=request()->validate(
            [
                'client-username'=>'required|min:3|max:40',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:clients,tel',
                'ville' => 'required|min:3',
                'email' => 'nullable|email|unique:clients,email',
            ]
        );

        $photoPath = NULL;
        if(!empty(request('photo'))){
            $photoPath = request('photo')->store('photos', 'public');
        }
        

        Client::create(
            [
                'nom_utilisateur'   => $validated['client-username'],
                'photo'             => $photoPath,
                'tel'               => $validated['phone'],
                'email'             => $validated['email'],
                'city'              => $validated['ville'],
                'password'          => 'admin'
            ]
        );

        return to_route('clientele.index');
    }

    public function update($clientId){

        $client = Client::findOrFail($clientId);

        $validated=request()->validate(
        [
            'client-username'=>'required|min:3|max:40',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:clients,tel,'.$clientId,
            'ville' => 'required|min:3',
            'email' => 'nullable|email|unique:clients,email,'.$clientId,
        ]);

        $photoPath = $client->photo;
        if(!empty(request('photo'))){
            $photoPath = request('photo')->store('photos', 'public');
        }

        $client->update([
            'nom_utilisateur' => $validated['client-username'],
            'photo' => $photoPath,
            'tel' => $validated['phone'],
            'email' => $validated['email'],
            'city'  => $validated['ville'],
        ]);
        $client->save();
        return to_route('clientele.index');
    }

    public function destroy($clientId){

        $client = Client::findOrFail($clientId);

        $client->delete();

        return to_route('clientele.index');
    }

    public function getCustomers(){

        $productId = request()->input('product_id');

        $getCustomers = Client::select('clients.*')
                            ->join('ventes','ventes.id_client','=','clients.id')                            
                            ->join('ligne_ventes','ligne_ventes.id_vente','=','ventes.id')
                            ->where('ligne_ventes.id_produit','=',$productId)->get();

        return view('/admin.stocks.getCustomers',['getCustomers'=>$getCustomers]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LigneVente;
use App\Models\produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    public function panier(Request $request){

        $idProduits = json_decode($request->query('id_products'));
        $products = produit::whereIn('id',$idProduits)->get();

        return view('/admin/produit.Panier',['produits'=>$products]);

    }
    public function facture(Request $request){

        $products = json_decode($request->input('products'));
        $products = Produit::whereIn('id',$products)->get();
        $quantities = json_decode($request->input('quantities'));

        $clients = Client::all();

        // get the last facture id from vente table
        $lastFacture = 0;

        return view('/admin/produit.facture',['products'=>$products,'quantities'=>$quantities,'clients'=>$clients,'lastFactureid'=>$lastFacture]);

    }
    public function dfacture(Request $request){
        $idProducts = json_decode($request->input('products'));
        $products = Produit::whereIn('id', $idProducts)->get();
        $quantities = json_decode($request->input('quantities'));
    
        $validated = request()->validate(
            [
                'client' => 'required|exists:clients,id',
                'nom' => 'required|min:3',
                'prenom' => 'required|min:3',
                'ville' => 'required|min:3',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'ville' => 'required|min:3',
                'email' => 'nullable|email',
            ]
        );
    
        $client = $request->input('client');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $ville = $request->input('ville');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $dataClient = array('idClient' => $client, 'nom' => $nom, 'prenom' => $prenom, 'ville' => $ville, 'phone' => $phone, 'email' => $email);
    
        $vente = new Vente();
        $vente->id_gestionaire = Auth::user()->id;
        $vente->id_client = $client;
        $vente->save();
    
        $getIdVente = $vente->id;
    
        $i = 0;
        foreach($products as $product){
            $ligneVente = new LigneVente();
            $ligneVente->id_vente = $getIdVente;
            $ligneVente->id_produit = $product->id;
            $ligneVente->quantite = $quantities[$i];
            $ligneVente->prix = $product->prix; // Enregistrer le prix du produit
            $ligneVente->save();
    
            $getProduct = Produit::find($product->id);
            $getProduct->qte_stock -= $quantities[$i];
            $getProduct->save();
    
            $i++;
        }
    
        return view('/admin/produit.Dfacture', ['products' => $products, 'quantities' => $quantities, 'dataClient' => $dataClient, 'date' => $vente->created_at, 'commande' => $vente->id]);
    }
    
}

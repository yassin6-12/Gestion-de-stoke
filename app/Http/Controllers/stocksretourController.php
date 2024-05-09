<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LigneVente;
use App\Models\produit;
use App\Models\retoure_produit;
use App\Models\Vente;
use Illuminate\Http\Request;

class stocksretourController extends Controller
{
    public function index(){
        // get products saled
        $productsVented = LigneVente::select('id_produit')->distinct()->get();
        $productsVented = produit::whereIn('id', $productsVented)
                                ->select('id', 'nom')
                                ->get();

        // Get customers who have purchased
        $customers  = Vente::select('id_client')->distinct()->get();
        $customers  = Client::whereIn('id',$customers)
                            ->select('id','nom_utilisateur')
                            ->get();

        $returnedProducts = retoure_produit::all();

        return view('/admin.stocks.retour',['products'=>$productsVented,'customers'=>$customers,'returnedProducts'=>$returnedProducts]);
    }

    public function store(){

        $validated=request()->validate(
            [
                'item-name'=>'required|exists:produits,id',
                'item-customer' => 'required|exists:clients,id',
                'item-date-return' => 'required|date',
                'item-total' => 'required',
            ]);
    
        retoure_produit::create(
            [
                'id_produit'    => $validated['item-name'],
                'id_client'     => $validated['item-customer'],
                'total'         => $validated['item-total'],
                'created_at'    => $validated['item-date-return']
            ]
        );

        // delete de ligne_vente of the product 
        $getLigneVente = LigneVente::select('ligne_ventes.*')
                        ->join('ventes','ventes.id','=','ligne_ventes.id_vente')
                        ->where('ligne_ventes.id_produit','=',$validated['item-name'])
                        ->where('ventes.id_client','=',$validated['item-customer'])->first();
        $get_idVente = $getLigneVente->id_vente;
        $getLigneVente->delete();

        // delete de vente si il n y a aucun ligne_vente relie

        $getVente = LigneVente::where('id_vente',$get_idVente);
        if($getVente->count() === 0){
            $vente = Vente::find($get_idVente);
            $vente->delete();
        }

        // add 1 to stock of the current product

        $getProduct = produit::find($validated['item-name']);
        $getProduct->update([
            'qte_stock' => $getProduct->qte_stock + 1,
        ]);

        return to_route('StocksRetour');
    }

    public function update($product){

        $getAncientProduct = retoure_produit::findOrFail($product);

        $validated=request()->validate(
            [
                'item-name'=>'required|exists:produits,id',
                'item-customer' => 'required|exists:clients,id',
                'item-date-return' => 'required|date',
                'item-total' => 'required',
            ]
        );

        $getAncientProduct->update([
            'id_produit'    => $validated['item-name'],
            'id_client'     => $validated['item-customer'],
            'total'         => $validated['item-total'],
            'created_at'    => $validated['item-date-return']
        ]);

        // there are more instruction must do

        return to_route('StocksRetour');
    }

    public function destroy($product){

        $getProduct = retoure_produit::findOrFail($product);
        $getProduct->delete();
        
        return to_route('StocksRetour');
    }
}

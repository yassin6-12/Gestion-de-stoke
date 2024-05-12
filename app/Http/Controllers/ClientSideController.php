<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\LigneVente;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientSideController extends Controller
{
    public function index(){
        $bestCategories = Categorie::take(3)->get();

        // take the last 4 categories added in produit table
        $last4Categories = produit::orderBy('id', 'desc')
        ->distinct('categorie_id')
        ->take(4)
        ->pluck('categorie_id');

        $lastCats = array();
        foreach($last4Categories as $cat){
            $lastCats[] = $cat;
        }

        $getCatsNames = Categorie::whereIn('id',$lastCats)
                            ->get()->sortBy(function ($item) use ($lastCats) {
                                return array_search($item->id, $lastCats);
                            });;


        // take 5 produit for the 4 categories added
        $newProducts = array();
        foreach($last4Categories as $category){
            $newArray = produit::where('categorie_id',$category)->latest()->take(5)->get();
            $newProducts[] = $newArray;
        }

        // get the 4 top selling products
        $topVente = LigneVente::groupBy('id_produit')
        ->select('id_produit', DB::raw('COUNT(*) as count'))
        ->orderByDesc('count')
        ->take(4)
        ->get();

        $top4Vente = array();
        foreach($topVente as $vente){
            $top4Vente[] = $vente->id_produit;
        }
         
        $top4Selling = produit::whereIn('id',$top4Vente)->get();

        // get the top deal
        $topDeal = produit::orderBy('remise', 'desc')
                        ->first();

        // get the 12 top selling products
        $top12Vente = LigneVente::groupBy('id_produit')
        ->select('id_produit', DB::raw('COUNT(*) as count'))
        ->orderByDesc('count')
        ->take(12)
        ->get();

        $top12ToVente = array();
        foreach($top12Vente as $vente){
            $top12ToVente[] = $vente->id_produit;
        }

        $top12Selling = produit::whereIn('id',$top12ToVente)->get();

        return view('/client.index',[
            'bestCategories'    =>$bestCategories,
            'last'              =>$lastCats,
            'newProducts'       =>$newProducts,
            'catsName'          =>$getCatsNames,
            'topSelling'        =>$top4Selling,
            'topDeal'           =>$topDeal,
            'top12Selling'      =>$top12Selling
        ]);
    }

    public function show($product){
        
        return view('/client.product');
    }

    public function stores(){
       
        return view('/client.stores');
    }
}

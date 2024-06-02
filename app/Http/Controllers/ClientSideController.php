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
        $last4Categories = produit::orderBy('categorie_id', 'desc')
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
        $getProduct     = produit::findOrFail($product);
        $getCategory    = Categorie::find($getProduct->categorie_id);
        $relatedProducts= produit::orderBy('id', 'desc')
                            ->where('categorie_id',$getCategory->id)
                            ->whereNot('id',$getProduct->id)
                            ->take(4)
                            ->get();
        return view('/client.product',[
            'product'           => $getProduct,
            'category'          => $getCategory,
            'relatedProducts'   => $relatedProducts,
        ]);
    }

    public function showCat(Request $request){
        $allCats = Categorie::all();
        $allProducts = produit::all();

        // get the category value
        $category = NULL;
        if($request->has('category')){
            $category  = Categorie::find($request->input('category'));
        }

        // get the prices
        $min_price = NULL;
        $max_price = NULL;
        if($request->has('min_price') && $request->has('max_price')){
            $min_price = $request->input('min_price');
            $max_price = $request->input('max_price');
        }
        // filter the products with category type and prices
        $filterProducts = NULL;
        if($category || $min_price || $max_price){
            if($category && $min_price && $max_price){
                $filterProducts = produit::where('categorie_id',$category->id)
                        ->whereBetween('prix',[$min_price,$max_price])
                        ->get();
            }
            elseif($category){
                $filterProducts = produit::where('categorie_id',$category->id)->get();
            }else if($min_price && $max_price){
                $filterProducts = produit::whereBetween('prix',[$min_price,$max_price])->get();
            }

        }

        return view('/client.stores',[
            'allCats'       => $allCats,
            'allProducts'   => $allProducts,
            'filterProducts'=> $filterProducts,
            'category'      => $category
            ]
        );
    }

    public function profile(){
        
        return view('/client.profile');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    public function index(){
        $allCategories = Categorie::all();
        return view('/client.index',['allCategories'=>$allCategories]);
    }

    public function show($product){
        $allCategories = Categorie::all();
        return view('/client.product',['allCategories'=>$allCategories]);
    }

    public function stores(){
        $allCategories = Categorie::all();
        return view('/client.stores',['allCategories'=>$allCategories]);
    }
}

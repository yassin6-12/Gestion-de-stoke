<?php

namespace App\Http\Controllers;

use Akaunting\Apexcharts\Chart;
use App\Models\Client;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $productcount=produit::all()->count();
        // dd($productdata);
        $admincount=User::where('type_user','admin')->count();
        $gestcount=User::where('type_user','Gestionnaire')->count();
        $clientcount=Client::all()->count();

        $chart = (new Chart)->setType('plotOptions')
        ->setWidth('100%')
        ->setHeight(300)
        ->setLabels(['Sales', 'Deposit'])
        ->setDataset('Income by Category', 'donut', [$admincount, $gestcount]);

        return view('home',['productcount'=>$productcount,'admincount'=>$admincount,'gestcount'=>$gestcount,'chart'=>$chart]);
    }

}

<?php

namespace App\Http\Controllers;

use Akaunting\Apexcharts\Chart as ApexchartsChart;
use App\Models\Produit;
use App\Models\User;
use App\Models\Client;
use App\Models\LigneVente;
use App\Charts\Chart;
use App\Models\Vente;

class HomeController extends Controller
{
    public function home()
    {
        // Get the counts of various entities
        $productCount = Produit::count();
        $adminCount = User::where('type_user', 'admin')->count();
        $gestCount = User::where('type_user', 'gestionaire')->count();
        $clientCount = Client::count();

        // Calculate the total sales
        $sales = LigneVente::sum('prix');
        $orders = Vente::count();
        // dd($sales);

        // Create the chart
        $chart = (new ApexchartsChart)->setType('donut')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(['Admins', 'Gestionnaire', 'Clients'])
            ->setDataset('Income by Category', 'donut', [$adminCount, $gestCount, $clientCount]);

        $chart2 = (new ApexchartsChart)
            ->setType('bar')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(['Sales', 'Orders'])
            ->setDataset('Sales', 'line', [$sales])
            ->setDataset('Orders', 'line', [$orders]);

        // Return the view with the data
        return view('home', [
            'productCount' => $productCount,
            'adminCount' => $adminCount,
            'gestCount' => $gestCount,
            'clientCount' => $clientCount,
            'sales' => $sales,
            'orders'=>$orders,
            'chart' => $chart,
            'chart2'=>$chart2
        ]);
    }
}

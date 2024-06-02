@extends('layouts.master')
 @section('breadcrumb')
     <ol class="breadcrumb">
         <li class="breadcrumb-item">
             <i class="bi bi-house"></i>
             <a href="/">Domicile</a>
         </li>
         <li class="breadcrumb-item"><a href="{{route('produit.index')}}">Produit</a></li>
         <li class="breadcrumb-item text-capitalize" ><a href="{{route('produit.ventes')}}">vente produit</a></li>
         <li class="breadcrumb-item breadcrumb-active text-capitalize" aria-current="page">{{$produit->nom}}</li>
     </ol>
 @endsection
 @section('main')
 <div class="container">

    <h2 class="mb-3 text-capitalize">informations de vente sur {{$produit->nom}}</h2>

    <table class="table table-striped table-bordered mt-5">
        <thead>
            <tr>
                <th scope="col">ID Vente</th>
                <th scope="col">Client</th>
                <th scope="col">quantitie</th>
                <th scope="col">date vente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailsProduit as $detail)
                <tr>
                    <td style="vertical-align: middle;">#{{$detail->ligne_id}}</td>
                    <td style="vertical-align: middle;">{{$detail->nom_utilisateur}}</td>
                    <td style="vertical-align: middle;">{{$detail->quantite}}</td>
                    <td style="vertical-align: middle;">{{$detail->ligne_at}}</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

</div>
 @endsection
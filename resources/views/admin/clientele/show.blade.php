@extends('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Clientele</li>
        <li class="breadcrumb-item">Historique</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">liste d'achats</li>
    </ol>
@endsection

@section('main')
<div class="container">
    <h2>Liste des achats de client</h2> 
    <main class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">PRODUITS</th>
                    <th scope="col">CATEGORIE</th>
                    <th scope="col">DATE ACHATS</th>
                    <th scope="col">PRIX</th>
                </tr>
            </thead>
            <tbody>
                @foreach($achats as $achat)
                    <tr>
                        <td style="vertical-align: middle;">{{$achat->id}}</td>
                        <td style="vertical-align: middle;">
                            @php
                                $firstImage = json_decode($achat->images)[0];
                            @endphp
                            <img src="{{asset('storage/' . $firstImage)}}" alt="{{$achat->produit_nom}}" class="img-thumbnail" width="50" style="margin-right: 10px;">
                        </td>
                        <td style="vertical-align: middle;">{{$achat->produit_nom}}</td>
                        <td style="vertical-align: middle;">{{$achat->categorie_nom}}</td>
                        <td style="vertical-align: middle;">{{$achat->date_achat}}</td>
                        <td style="vertical-align: middle;">{{$achat->prix}} DA</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
@endsection

@extends('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Inventaire</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">liste des stocks</li>
    </ol>
@endsection

@section('main')
<div class="container">
    <h2>Liste d’inventaire des stocks</h2>
    <main class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">PRODUITS</th>
                    <th scope="col">CATEGORIE</th>
                    <th scope="col">DATE AJOUTÉE</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">PRIX</th>
                    <th scope="col">REMIS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td style="vertical-align: middle;">{{ $produit->id }}</td>
                        <td style="vertical-align: middle;">
                            <div class="d-flex align-items-center">
                                {{-- <img src="{{ Storage::url($produit->images) }}" alt="{{ $produit->nom }}" class="img-thumbnail" width="50" style="margin-right: 10px;"> --}}

                                @php
                                    $image = json_decode($produit->images)[0];
                                @endphp
                                <img src="{{asset('storage/' . $image)}}" alt="{{$produit->nom}}" class="img-thumbnail" width="50" style="margin-right: 10px;">
                            </div>
                        </td>
                        <td style="vertical-align: middle;">{{ $produit->nom }}</td>
                        <td style="vertical-align: middle;">{{ $produit->categorie->nom }}</td>
                        <td style="vertical-align: middle;">{{ $produit->created_at->format('d F Y') }}</td>
                        <td style="vertical-align: middle;">{{ $produit->qte_stock }}</td>
                        <td style="vertical-align: middle;">{{ $produit->prix }}</td>
                        <td style="vertical-align: middle;">{{ $produit->remise }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
@endsection

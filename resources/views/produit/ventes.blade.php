@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('produit.index')}}">Produit</a></li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Ventes Produit</li>
    </ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des produits vendus</div>
                    
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @if (count($produits) > 0)
                                @foreach ($produits as $produit)
                                    <div class="col-xxl-3 col-md-4 col-sm-6 col-12 mb-5 gallery-item">

                                        <div class="product-card">
                                            @php
                                                $firstImage = json_decode($produit->images)[0];
                                            @endphp
                                            <img class="product-card-img-top" src="{{asset($firstImage)}}" alt="Image of product" style="height:200px;object-fit:contain">
                                            <div class="product-card-body">
                                                
                                                <h3 class="product-title text-capitalize text-center">{{$produit->nom}}</h3>
                                                <div class="d-grid gap-2">
                                                    <a href="{{route('produit.venteDetails',$produit->id)}}" class="btn btn-success text-capitalize">show details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                    <div class="text-center my-3 fw-bold">Il n y a aucun produit vendus</div>
                            @endif
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

</div>
@endsection
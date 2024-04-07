@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">exempl Laptop(table catégorer)</li>
    </ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste par exempl(Pc)</div>
                    <div class="ml-auto">
                        <a href="{{route('produit.Panier')}}" class="btn btn-dark"><span class="badge shade-red me-2">20</span>VoirPanier</a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Row start -->
                    <div class="row">
                        <div class="col-xxl-3 col-md-4 col-sm-6 col-12">
                            <div class="product-card">
                                <img class="product-card-img-top" src="assets/images/food/img6.jpg" alt="Bootstrap Gallery">
                                <div class="product-card-body">
                                    <h5 class="product-title">marque</h5>
                                    <div class="product-price">
                                        <span class="disount-price">$20</span>
                                        <span class="actucal-price">$24</span>
                                        <span class="off-price">50% Off</span>
                                    </div>
                                    <div class="product-description">
                                        ModèleModèleModèleModèleModèleModèle
                                    </div>
                                    <div class="product-actions">
                                        <button class="btn btn-success addToCart">Ajouter au panier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

</div>

@endsection
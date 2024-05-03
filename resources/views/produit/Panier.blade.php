@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Panier</li>
    </ol>
@endsection
@section('main')
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Éléments ajoutés</div>
                <div class="ml-auto">
                    <a href="{{route('produit.index')}}" class="btn btn-dark">Retour aux produits</a>
                </div>
            </div>
            <div class="card-body">

                <!-- Row start -->
                <div class="row">
                    <div class="col-xxl-6 col-sm-12 col-12">
                        <div class="product-added-card">
                            <img class="product-added-img" src="assets/images/food/img7.jpg" alt="Moonlight Admin">
                            <div class="product-added-card-body">
                                <h5 class="product-added-title">Barbecue Chicken Salad</h5>
                                <div class="product-added-price">$25.00</div>
                                <div class="product-added-description">
                                    Lettuce, cucumbers, tomatoes, scallions, corn, chicken with tangy barbecue ranch dressing.
                                </div>
                                <div class="product-added-actions">
                                    <button class="btn btn-light remove-from-cart">Retirer de panier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <div class="sub-total-container">
                            <div class="total">Order Total: $90.00</div>
                            <a href="{{route('facture')}}" class="btn btn-success btn-lg">Caisse</a>
                        </div>
                    </div>
                </div>
                <!-- Row end -->

            </div>
        </div>
    </div>
</div>
@endsection

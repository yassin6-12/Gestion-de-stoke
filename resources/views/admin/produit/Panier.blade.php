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
<style>
      .product-image {
        max-width: 100%;
        height: auto;
        max-height: 300px; /* Adjust the max-height as needed */
        object-fit: cover; /* Ensures the image covers the box and maintains aspect ratio */
    }
</style>
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Éléments ajoutés</div>
                <div class="ml-auto">
                    <a href="{{ route('produit.index') }}" class="btn btn-dark">Retour aux produits</a>
                </div>
            </div>
            <div class="card-body">

                <!-- Row start -->
                <div class="row">
                    @foreach ($produits as $produit)
                        <div class="col-xxl-6 col-sm-12 col-12">
                            <div class="product-added-card">
                                @php
                                    $firstImage = json_decode($produit->images)[0];
                                @endphp
                                <img src="{{ asset('storage/' . $firstImage) }}" alt="Admin Templates" class="img-fluid product-image">
                                <div class="product-added-card-body">
                                    <h5 class="product-added-title">{{ $produit->nom }}</h5>
                                    <div class="product-added-price">DA<span class="product-prix-unitaire">{{ $produit->prix - ($produit->prix * $produit->remise / 100) }}</span>
                                    </div>
                                    <div class="product-added-description">
                                        {{ $produit->description }}
                                    </div>
                                    <div class="product-added-actions">
                                        <button class="btn btn-light remove-from-cart">Retirer du panier</button>
                                    </div>
                                    <div class="product-added-quantity my-2">
                                        <div class="d-flex align-items-center">
                                            <label for="quantity" class="label-control fw-bold me-3">Quantité: </label>
                                            <input type="number" name="quantity-{{ $produit->id }}" id="{{ $produit->id }}" value="1" min="1" max="{{ $produit->qte_stock }}" placeholder="Quantité" class="form-control quantity" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-12 col-12">
                        <div class="sub-total-container">
                            <div class="total">Total de la commande: DA<span id="total-panier"></span></div>
                            <form action="{{ route('facture') }}" method="POST" id="form-panier-to-facture">
                                @csrf
                                <button type="submit" id="submit-panier" class="btn btn-success btn-lg">Caisse</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row end -->

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            // Calculer le prix total initial des produits dans le panier
            var total = 0;
            $('.product-prix-unitaire').each(function(){
                total += parseFloat($(this).text());
            });
            $('#total-panier').text(total);

            // Mettre à jour le prix total lorsque la quantité change
            $('input.quantity').on('input change', function(){
                if (parseInt($(this).val()) > parseInt($(this).attr('max'))) {
                    $(this).val($(this).attr('max'));
                }
                if ($(this).val() !== '' && $(this).val() > 0) {
                    total = 0;
                    $('.product-prix-unitaire').each(function(){
                        let quantity = $(this).closest('.product-added-card-body').find('.quantity').val();
                        total += (parseFloat($(this).text()) * quantity);
                    });
                    $('#total-panier').text(total);
                }
            });

            // Ajouter la quantité de chaque produit au formulaire avant de soumettre
            $('#submit-panier').click(function(e){
                var quantities = [];
                var products = [];
                $('input.quantity').each(function(){
                    quantities.push($(this).val());
                    products.push($(this).attr('id'));
                });
                $('<input>').attr({
                    type: 'hidden',
                    name: 'products',
                    value: JSON.stringify(products)
                }).appendTo('#form-panier-to-facture');
                $('<input>').attr({
                    type: 'hidden',
                    name: 'quantities',
                    value: JSON.stringify(quantities)
                }).appendTo('#form-panier-to-facture');
            });
        });
    </script>
@endsection

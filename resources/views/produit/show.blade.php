@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">{{$nomCat}}</li>
    </ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des produits de {{$nomCat}}</div>
                    
                </div>
                <div class="card-body">
                    <div class="container">
                    
                        <div class="row">
                           @foreach ($produits as $produit)
                            <div class="col-xxl-3 col-md-4 col-sm-6 col-12 mb-5 gallery-item">

                                    <div class="product-card">
                                        @php
                                            $firstImage = json_decode($produit->images)[0];
                                        @endphp
                                        <img class="product-card-img-top" src="{{asset($firstImage)}}" alt="Image of product">
                                        <div class="product-card-body">
                                            
                                            <h3 class="product-title text-capitalize">{{$produit->nom}}</h3>
                                            <div class="product-price">
                                                <span class="disount-price">
                                                    ${{$produit->prix  - ($produit->prix * $produit->remise / 100)}}
                                                </span>
                                                <span class="actucal-price">@if ($produit->remise)
                                                    ${{$produit->prix}}
                                                @endif</span>
                                                <span class="off-price">@if ($produit->remise)
                                                    {{$produit->remise}}% Off
                                                @endif</span>
                                            </div>
                                            <p class="produit-description" id="produit-desc">{{$produit->description}}</p>
                                            <div class="product-actions">
                                                <a href="{{route('Produit.produit',[$nomCat,$produit->id])}}" class="btn btn-sm btn-success text-capitalize ">voir le produit</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                           @endforeach
                           
                      
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

</div>

 


@endsection
@section('script')
    <script>
        // limit the number of characters print in product description
        var maxLength = 60;
            var text = document.getElementById('produit-desc').innerText;
            if (text.length > maxLength) {
                document.getElementById('produit-desc').innerText = text.substring(0, maxLength) + '...';
            }
    </script>
@endsection
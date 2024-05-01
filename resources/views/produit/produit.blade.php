@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produits</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">{{$nomCat}}</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">{{$produit->nom}}</li>
    </ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-capitalize">{{$produit->nom}}</div>
                    <div class="ml-auto">
                        <a href="{{route('panier')}}" class="btn btn-dark"><span class="badge shade-red me-2">20</span>VoirPanier</a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Row start -->
                    <div class="row">
                        <div class="col-xxl-3 col-md-4 col-sm-6 col-12">
                            <div class="product-card">
                                <div id="carouselImagesProduit" class="carousel slide">
                                    @php
                                        $allImages = json_decode($produit->images);
                                    @endphp
                                        <div class="carousel-inner">
                                            @for ($i = 0; $i < count($allImages); $i++)
                                            <div class="carousel-item @if($i == 0) active @endif">
                                                <img src="{{asset($allImages[$i])}}" alt="image {{$i}}" class="d-block w-100" />
                                            </div>
                                            @endfor
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImagesProduit" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon carousel-btn" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImagesProduit" data-bs-slide="next">
                                            <span class="carousel-control-next-icon carousel-btn" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                </div>
                                
                                <div class="product-card-body">
                                    <h5 class="product-title text-capitalize">{{$produit->nom}}</h5>
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
                                    <p class="produit-description my-3">{{$produit->description}}</p>
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
<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/modernizr.js"></script>
		<script src="assets/js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<!-- Rating JS -->
		<script src="assets/vendor/rating/raty.js"></script>
		<script src="assets/vendor/rating/raty-custom.js"></script>

		<!-- Main Js Required -->
		<script src="assets/js/main.js"></script>

		<!-- Product Js -->
		<script src="assets/js/product.js"></script>
@endsection

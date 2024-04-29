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
                            <div class="col-md-4 mb-3" style="height:320px;">
                                <a href="" class="gallery-item card-img-top mb-3 w-100 h-100">
                                    <div class="card">
                                        <div class="card-body" style="height:300px;">
                                            
                                            <img src="" alt="Image" class="w-100 h-100" />
                                            
                                            <h3 class="card-title text-capitalize">{{$produit->nom}}</h3>
                                            <p class="card-text">{{$produit->description}}</p>
                                            <h6 class="border-secondary bg-secondary px-2 py-1 rounded d-inline-block text-white">$ {{$produit->prix}}</h6>
                                        </div>
                                    </div>
                                </a>
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
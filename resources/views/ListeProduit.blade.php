@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Produits</li>
    </ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des produits</div>
                    
                </div>
                <div class="container">
                    
                     <div class="row">
                        <div class="col-md-4">
                         <a href="{{route('Produit')}}" class="gallery-item">
                          <img src="assets/images/pc.jpg" alt="Image 1">
                         </a>
                      </div>
                   
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

</div>

 


@endsection
@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Categories</li>
    </ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des categories</div>
                    
                </div>
                <div class="card-body">
                    <div class="container">
                    
                        <div class="row">
                           @foreach ($get_cats as $cat)
                           <div class="col-md-4 mb-3" style="height:320px;">
                               <div class="card">
                                <div class="card-body" style="height:300px;">
                                    <a href="{{route('Produit.show',$cat->nom)}}" class="gallery-item card-img-top mb-3 w-100 h-100">
                                        <img src="{{asset($cat->photo)}}" alt="Image {{$cat->id}}" class="w-100 h-100" />
                                    </a>
                                    <h3 class="card-title text-center text-capitalize">{{$cat->nom}}</h3>
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
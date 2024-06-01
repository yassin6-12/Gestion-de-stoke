@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produits</li>
        
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
                           <div class="col-md-4 mb-3">
                               <div class="card">
                                <div class="card-body">
                                    <a href="{{route('Produit.show',$cat->nom)}}" class="gallery-item card-img-top mb-3">
                                        {{-- <img src="{{asset($cat->photo)}}" alt="Image {{$cat->id}}" style="height:200px;object-fit:contain" /> --}}
                                        <img src="{{asset('storage/' . ($cat->photo ? $cat->photo : 'photos/default.png'))}}" alt="Admin Templates" style="height:200px;object-fit:contain">
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
@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('produit.index')}}">Produit</a></li>
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
                        <div class="text-end" id="icon-panier">
                            
                            <form action="{{route('panier')}}" method="GET" id="form-go-to-panier">
                                
                                <button type="submit" id="go-to-panier"  class="btn btn-sm btn-light"><div class="badge rounded bg-danger number-of-produits"></div> <strong class="desc-produit-panier"></strong></button>
                            </form>
                        </div>
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
                                                        <button  class="btn btn-sm btn-success text-capitalize ajouter-au-panier" data-idproduit="{{$produit->id}}">Ajouter au panier</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                @endforeach
                            @else
                                    <div class="text-center my-3 fw-bold">Il n y a aucun produit dans cette categorie</div>
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

@section('script')
    <script>
        // limit the number of characters print in product description
        var maxLength = 60;
            var text = document.getElementById('produit-desc');
            console.log( text && text.innerText.length> maxLength);
            if (text && text.innerText.length > maxLength) {
                document.getElementById('produit-desc').innerText = text.innerText.substring(0, maxLength) + '...';
            }

        // ajouter produit au panier
        $(document).ready(function(){
            // get panier array from localstorage
            $panierOfProduits = localStorage.getItem('panier')?JSON.parse(localStorage.getItem('panier')):[];

            // event fire when click ajouter au panier 

            $('.ajouter-au-panier').click(function(){

                if($(this).hasClass('btn-success')){
                    if(!$panierOfProduits.some(function(item){
                        return item == $(this).data('idproduit')
                    },this)){
                        $panierOfProduits.push($(this).data('idproduit'));
                    }
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-warning');
                    $(this).text('Retirer de panier');
                }

                else if ($(this).hasClass('btn-warning')){
                    $panierOfProduits.splice($panierOfProduits.indexOf($(this).data('idproduit')),1);
                    $(this).removeClass('btn-warning');
                    $(this).addClass('btn-success');
                    $(this).text('Ajouter au panier');
                }
                
                
                localStorage.setItem('panier',JSON.stringify($panierOfProduits));

                
                // 
                set_panier_button();
            })

            // set the number of produit in panier button
            function set_panier_button(){
                if(localStorage.getItem('panier') && $panierOfProduits.length > 0){
                    $('.number-of-produits').text($panierOfProduits.length);
                    
                    $('.desc-produit-panier').text('Produits Aux Panier');
                }else{
                    $('.number-of-produits').text(0);
                    $('.desc-produit-panier').text('Panier Vide')
                }
                
            }
            set_panier_button();

            // design the button of each product
            function set_products_buttons(){
                $('.ajouter-au-panier').each(function(index,element){
                    if($panierOfProduits.some(function(item){
                        return item == $(this).data('idproduit')
                    },this)){
                        $(this).removeClass('btn-success');
                        $(this).addClass('btn-warning');
                        $(this).text('Retirer de panier');
                    }
                });
            }
            set_products_buttons()

            // submit form and add localstorage data to an input
            $('#go-to-panier').click(function(){
                $(this).before('<input type="hidden" name="id_products" value="'+localStorage.getItem('panier')+'" />');
            })
        })
        console.log('amine mokeddem')
        



    </script>
@endsection
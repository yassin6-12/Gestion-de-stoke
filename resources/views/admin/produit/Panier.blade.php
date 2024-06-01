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
                    @foreach ($produits as $produit)
                        <div class="col-xxl-6 col-sm-12 col-12">
                            <div class="product-added-card">
                                @php
                                    $firstImage = json_decode($produit->images)[0];
                                @endphp
                                <img src="{{asset('storage/' .$firstImage)}}" alt="Admin Templates">
                                <div class="product-added-card-body">
                                    <h5 class="product-added-title">{{$produit->nom}}</h5>
                                    <div class="product-added-price">DA<span class="product-prix-unitaire">{{$produit->prix - ($produit->prix * $produit->remise/100)}}</span>
                                    </div>
                                    <div class="product-added-description">
                                        {{$produit->description}}
                                    </div>
                                    <div class="product-added-actions">
                                        <button class="btn btn-light remove-from-cart">Retirer de panier</button>
                                    </div>
                                    <div class="produtct-added-quantity my-2">
                                        <div class="d-flex align-items-center">
                                            <label for="quantity" class="label-control fw-bold me-3">quantity: </label>
                                            <input type="number" name="quantity-{{$produit->id}}" id="{{$produit->id}}"  value="1" min="1" max="{{$produit->qte_stock}}"  placeholder="quantity" class="form-control quantity" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-12 col-12">
                        <div class="sub-total-container">
                            <div class="total" >Order Total: DA<span id="total-panier"></span></div>
                            
                            <form action="{{route('facture')}}" method="POST" id="form-panier-to-facture">
                                @csrf
                                <button type="submit"  id="submit-panier" class="btn btn-success btn-lg">Caisse</button>
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
            // set the first total price of all products (panier)

            var total = 0;
            $('.product-prix-unitaire').each(function(index,element){
                total += parseFloat($(this).text());
            })
            $('#total-panier').text(total)

            // change price when change the quantity

            $('input.quantity').keyup(function(){
                if(parseInt($(this).val())  > parseInt($(this).attr('max'))){
                    $(this).val($(this).attr('max'));
                }

                if($(this).val() != '' && $(this).val() > 0){
                    total = 0;
                    $('.product-prix-unitaire').each(function(index,element){
                        let quantity = $(this).parent().siblings('.produtct-added-quantity').find('.quantity').val();
                        total += (parseFloat($(this).text()) * quantity);
                    })
                    $('#total-panier').text(total)
                }
                
            })
            $('input.quantity').change(function(){
                if($(this).val() != '' && $(this).val() > 0){
                    total = 0;
                    $('.product-prix-unitaire').each(function(index,element){
                        let quantity = $(this).parent().siblings('.produtct-added-quantity').find('.quantity').val();
                        total += (parseFloat($(this).text()) * quantity);
                    })
                    $('#total-panier').text(total)
                }
            })

            // add quantity of each product to the form before go to facture page
            $('#submit-panier').click(function(e){
                var quantities = [];
                var products = [];
                $('input.quantity').each(function(index,ele){
                    quantities.push($(this).val());
                    products.push($(this).attr('id'));
                })
                $(this).before('<input type="hidden" name="products" value='+JSON.stringify(products)+' />');
                $(this).before('<input type="hidden" name="quantities" value='+JSON.stringify(quantities)+' />');
            })
        })
    </script>
@endsection

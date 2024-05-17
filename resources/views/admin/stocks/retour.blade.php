<?php 
  use App\Models\produit;
  use App\Models\Client;
?>

@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Catégorie</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">retours</li>
    </ol>
@endsection
@section('main')
<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-3">Retours d’articles</h2>
        <button type="button" class="btn btn-primary" id="add-category" data-bs-toggle="modal" data-bs-target="#ModalDeleteItem">Ajouter des articles retournés</button>
    </div>
    
      <div class="modal fade mt-5" id="ModalDeleteItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Return Item</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('StocksRetour.store')}}" method="POST" id="form-ajouter-produiter-retourner">
                @csrf
                <div class="mb-4">
                    <label class="fw-bold my-2">Item</label>
                    <select name="item-name" class="form-select" id="item-name">
                      <option hidden>Chose the item</option>
                      @foreach ($products as $product)
                          <option value="{{$product->id}}">{{$product->nom}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Customer</label>
                        <select name="item-customer" id="item-customer" class="form-select">
                            <option hidden>Chose a customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->nom_utilisateur}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Return Date</label>
                        <input type="date" name="item-date-return" class="form-control">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="fw-bold my-2">Total</label>
                    <input type="text" name="item-total" class="form-control">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="ajouter-produit-retourner">Ajouter</button>
            </div>
          </div>
        </div>
      </div>

  <main class="container mt-5">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ARTICLES</th>
                <th scope="col">CLIENT</th>
                <th scope="col">RETURN DATE</th>
                <th scope="col">TOTAL</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @if (count($returnedProducts) > 0)
              @foreach ($returnedProducts as $product)
                  @php
                      $article = produit::where('id',$product->id_produit)->first();
                      $client  = Client::where('id',$product->id_client)->first();
                  @endphp
                  <tr>
                    <td style="vertical-align: middle;">#{{$product->id}}</td>
                    <td style="vertical-align: middle;">{{$article->nom}}</td>
                    <td style="vertical-align: middle;">
                      <div class="d-flex align-items-center">
                        <img src="{{asset('storage/'.$client->photo)}}" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                        <span>{{$client->nom_utilisateur}}</span>
                      </div>
                    </td>
                    <td style="vertical-align: middle;">{{$product->created_at->format('Y-m-d')}}</td>
                    <td style="vertical-align: middle;">${{$product->total}}</td>
                    <td style="vertical-align: middle;"> 
                      <button type="button" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#ModalEditProduct-{{$product->id}}">
                        <i class="bi bi-pencil"></i>
                      </button> 
                      <div class="modal fade mt-5" id="ModalEditProduct-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg ">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Retoure Produit</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{route('StocksRetour.update',$product->id)}}" method="POST" id="stock-return-{{$product->id}}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="fw-bold my-2">Item</label>
                                    <select name="item-name" class="form-select" id="item-name">
                                      @foreach ($products as $item)
                                          <option value="{{$item->id}}" @if ($product->id_produit == $item->id)
                                              selected
                                          @endif>{{$item->nom}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6">
                                        <label class="fw-bold my-2">Customer</label>
                                        <select name="item-customer" id="item-customer" class="form-select">
                                            @foreach ($customers as $customer)
                                              <option value="{{$customer->id}}" @if ($customer->id == $product->id_client)
                                                  selected
                                              @endif>{{$customer->nom_utilisateur}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="fw-bold my-2">Return Date</label>
                                        <input type="date" name="item-date-return" value="{{$product->created_at->format('Y-m-d')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="fw-bold my-2">Total</label>
                                    <input type="text" name="item-total" value="{{$product->total}}" class="form-control">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary stock-return-btn" data-id="{{$product->id}}">Modifier</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form action="{{route('StocksRetour.destroy',$product->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer le produit">
                            <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
              @endforeach    
            @else
                <div class="text-center fw-bold">Il n y a aucune produit a retourne</div>
            @endif
        </tbody>
    </table>
</main>
  </div>

  <!-- Button trigger modal -->
  
@endsection
@section('script')
    <script>
        $(document).ready(function(){
          // change customer with change of the product
          $('#item-name').change(function(){
            console.log('changed');
            $.ajax({
              method:'GET',
              url:'{{route("getCustomers")}}',
              data:{
                product_id:$(this).val()
              },
              success:function(data,status,xhr){
                $('#item-customer').html(data);
              },
              error:function(xhr,status,err){
                console.log(err);
              }
            })
          })

          // submit ajouter un produit retourner
          $('#ajouter-produit-retourner').click(function(){
            $('#form-ajouter-produiter-retourner').submit();
          })

          // submit modifier un produit retourner
          $('.stock-return-btn').click(function(){
            $('#stock-return-'+$(this).data('id')).submit();
          })

        })
    </script>
@endsection
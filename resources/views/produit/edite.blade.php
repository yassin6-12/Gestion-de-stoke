@extends('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item active" aria-current="page">Modifier produit</li>
    </ol>
@endsection

@section('main')
<div class="container">
    @include('shared.success-message')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-3">Informations sur les Produits</h2>
        <a href="{{route('Produit.create')}}"><button type="button" class="btn btn-primary" id="add-product" data-bs-toggle="modal" data-bs-target="#ModalAddProduct">Ajouter des produits</button></a>

    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODUIT</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRIX</th>
                <th scope="col">QTE STOCK</th>
                <th scope="col">QTE MIN</th>
                <th scope="col">REMISE</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td style="vertical-align: middle;">{{ $product->id }}</td>
                <td style="vertical-align: middle;">
                    <div class="d-flex align-items-center">
                        @php
                            $image = json_decode($product->images)[0];
                        @endphp
                        <img src="{{ asset('storage/'. $image) }}"  class="img-thumbnail" width="50" style="margin-right: 10px;">
                        <span>{{ $product->nom }}</span>
                    </div>
                </td>
                <td style="vertical-align: middle;">
                    {{ \Illuminate\Support\Str::words($product->description, 2, '...') }}
                </td>

                <td style="vertical-align: middle;">{{ $product->prix }}DA</td>
                <td style="vertical-align: middle;">{{ $product->qte_stock }}</td>
                <td style="vertical-align: middle;">{{ $product->qte_min }}</td>
                <td style="vertical-align: middle;">{{ $product->remise }}%</td>
                <td style="vertical-align: middle;">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalEditItem-{{ $product->id }}">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer le produit">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal pour modifier un produit -->
            <div class="modal fade mt-" id="ModalEditItem-{{ $product->id }}" tabindex="-1" aria-labelledby="ModalEditItemLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm-6">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalEditItemLabel">Modifier le produit</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="fw-bold my-2">Nom du produit</label>
                                    <input type="text" name="product-name" class="form-control" value="{{ $product->nom }}">
                                </div>
                                <div class="mb-4">
                                    <label class="fw-bold my-2">Description</label>
                                    <textarea name="product-description" class="form-control">{{ $product->description }}</textarea>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6">
                                        <label class="fw-bold my-2">Prix</label>
                                        <input type="text" name="product-price" class="form-control" value="{{ $product->prix }}">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="fw-bold my-2">Remise %</label>
                                        <input type="text" name="product-discount" class="form-control" value="{{ $product->remise }}">
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6">
                                        <label class="fw-bold my-2">Quantité minimale</label>
                                        <input type="text" name="product-min" class="form-control" value="{{ $product->qte_min }}">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="fw-bold my-2">Quantité en stock</label>
                                        <input type="text" name="product-stock" class="form-control" value="{{ $product->qte_stock }}">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
      <!-- Ajoutez les boutons de navigation et les options de sélection -->
    <div class="d-flex justify-content-between">
       <!-- Boutons de navigation -->
       <div class="ms-auto">
        @if ($products->previousPageUrl())
        <a href="{{ $products->previousPageUrl() }}" class="btn btn-primary">Précédent</a>
    @endif

    @if ($products->nextPageUrl())
        <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary">Suivant</a>
    @endif
    </div>
        <div class="d-flex align-items-center">
            <!-- Options de sélection -->
            <form action="{{ route('EditeProduit') }}" method="GET">
                <select name="perPage" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="10" {{ Request::get('perPage') == '10' ? 'selected' : '' }}>10</option>
                    <option value="20" {{ Request::get('perPage') == '20' ? 'selected' : '' }}>20</option>
                    <option value="30" {{ Request::get('perPage') == '30' ? 'selected' : '' }}>30</option>
                </select>
            </form>
        </div>


    </div>
</div>
@endsection

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
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-3">Informations sur les Produits</h2>
        <button type="button" class="btn btn-primary" id="add-product" data-bs-toggle="modal" data-bs-target="#ModalAddProduct">Ajouter des produits</button>
    </div>

    <!-- Modal pour ajouter des produits -->
    <div class="modal fade mt-5" id="ModalAddProduct" tabindex="-1" aria-labelledby="ModalAddProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalAddProductLabel">Ajouter des produits</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="fw-bold my-2">Nom du produit</label>
                            <input type="text" name="product-name" class="form-control">
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="fw-bold my-2">Profil du produit</label>
                                <input type="file" class="form-control-file" name="photo" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold my-2">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="fw-bold my-2">Prix</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="fw-bold my-2">Quantité en stock</label>
                                <input type="number" name="quantity-stock" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold my-2">Remise</label>
                            <input type="text" name="discount" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold my-2">Quantité minimum</label>
                            <input type="number" name="quantity-min" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODUIT</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRIX</th>
                <th scope="col">QNT-STOCK</th>
                <th scope="col">QNT-MIN</th>
                <th scope="col">REMISE</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="vertical-align: middle;">#SKUN111</td>
                <td style="vertical-align: middle;">
                    <div class="d-flex align-items-center">
                        <img src="assets/images/flags/1x1/gb.svg" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                        <span>yassien</span>
                    </div>
                </td>
                <td style="vertical-align: middle;">Tecno Megabook T1 Laptop (11th Gen Core i3/ 8GB/ 5...)</td>
                <td style="vertical-align: middle;">153050DA</td>
                <td style="vertical-align: middle;">26</td>
                <td style="vertical-align: middle;">5</td>
                <td style="vertical-align: middle;">5%</td>
                <td style="vertical-align: middle;"> 
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalEditItem">
                        <i class="bi bi-pencil"></i>
                    </button> 
                    <form action="" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer la catégorie">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal pour modifier un produit -->
    <div class="modal fade mt-5" id="ModalEditItem" tabindex="-1" aria-labelledby="ModalEditItemLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalEditItemLabel">Modifier le produit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="fw-bold my-2">Nom du produit</label>
                            <input type="text" name="product-name" class="form-control">
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="fw-bold my-2">Client</label>
                                <select name="product-customer" class="form-select">
                                    <option value="1">Phil Glover</option>
                                    <option value="2">yacine</option>
                                    <option value="3">newfel</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="fw-bold my-2">Date de retour</label>
                                <input type="date" name="return-date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold my-2">Total</label>
                            <input type="text" name="total" class="form-control">
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
</div>
@endsection

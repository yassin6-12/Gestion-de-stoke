@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Ajouter un produit</li>
    </ol>
@endsection
@section('main')
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Informations sur le produit</div>
            </div>
            <div class="card-body">
            <form action="{{Route('Produit.store')}}" id="demo-upload" class="dropzone" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Informations générales</div>
                            <div class="card-border-body">

                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nom du produit<span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name=product_name placeholder="Entrez le nom du produit">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Catégorie de produit <span class="text-red">*</span></label>
                                            <select class="form-control">
                                                <option value="Select Product Category">Sélectionner une catégorie de produit</option>
                                                <option value="Mobiles">Mobiles</option>
                                                <option value="Books">laptop</option>                                    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Prix du produit <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="product_price" placeholder="Entrez le prix du produit">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class=" mb-3">
                                            <label class="form-label">Remise sur le produit</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Définir la remise sur le produit">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="mb-0">
                                            <label class="form-label">Description du produit<span class="text-red">*</span></label>
                                            <textarea rows="4" class="form-control" name="product_description"
                                                      placeholder="Entrez la description du produit"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary" >ajouter</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Meta Data</div>
                            <div class="card-border-body">

                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Title <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Title">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Tags <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Tags">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="mb-0">
                                            <label class="form-label">Meta Description <span class="text-red">*</span></label>
                                            <textarea rows="4" class="form-control"
                                                placeholder="Enter Meta Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Images du produit</div>
                            <div class="card-border-body">

                                <div id="dropzone" class="dropzone-dark">
                                    <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">

                                        <div class="dz-message needsclick">
                                            <button type="button" class="dz-button">Déposez des fichiers ici ou cliquez pour les télécharger.</button><br>
                                            <span class="note needsclick">(Il ne s’agit que d’une zone de dépôt de démonstration. Les fichiers sélectionnés
                                                <strong>ne sont pas</strong> réellement téléchargés.)</span>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <div class="custom-btn-group flex-end">
                            <button type="button" class="btn btn-light">Cancel</button>
                            <a href="products.html" class="btn btn-success">Add Product</a>
                        </div>
                    </div>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection
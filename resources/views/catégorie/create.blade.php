@extends('layouts.master')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="index.html">Domicile</a>
    </li>
    <li class="breadcrumb-item">Catégorie</li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">Ajouter Catégorie</li>
</ol>
@endsection
@section('main')
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card">
            {{-- <div class="card-header">
                <div class="card-title">Product Information</div>
            </div> --}}
            <div class="card-body">
                <form action="/upload" id="demo-upload" class="dropzone">
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Ajouter votr catégorie</div>
                            <div class="card-border-body">

                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nom de la Catégorie <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Entrez le nom de la catégorie">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Status<span class="text-red">*</span></label>
                                            <select class="form-control">
                                                <option value="Sélectionner un statut">Sélectionner un statut</option>
                                                <option value="Mobiles">Publié</option>
                                                <option value="Books">Prévue</option>
                                                <option value="Games">Cachée</option>
                                            </select>
                                        </div>
                                       
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Date <span class="text-red">*</span></label>
                                            <input type="Date" class="form-control">
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
                            <button type="button" class="btn btn-light">Annuler</button>
                            <a href="products.html" class="btn btn-success">Ajouter produit</a>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
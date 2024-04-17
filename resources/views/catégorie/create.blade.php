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

<style>
    #demo-upload {
        border: none !important;
    }
</style>
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card">

            <div class="card-body">
                <form action="{{route('catégorie.store')}}" id="demo-upload" class="dropzone" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Ajouter votre catégorie</div>
                            <div class="card-border-body">

                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label for="categorie_name" class="form-label">Nom de la Catégorie <span class="text-red">*</span></label>
                                            <input id="categorie_name" name="categorie_name" type="text" class="form-control" placeholder="Entrez le nom de la catégorie"  >
                                        </div>
                                        
                                    </div>
                                    <div id="dropzone" class="dropzone dropzone-dark">

                                        <div class="dz-message needsclick">
                                            <button type="button" class="dz-button">Déposez des fichiers ici ou cliquez pour les télécharger.</button><br>
                                            <span class="note needsclick">(Il ne s’agit que d’une zone de dépôt de démonstration. Les fichiers sélectionnés
                                                <strong>ne sont pas</strong> réellement téléchargés.)</span>
                                        </div>



                                </div>


                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Images du produit</div>
                            <div class="card-border-body">

                                <div id="dropzone" class="dropzone dropzone-dark">

                                        <div class="dz-message needsclick">
                                            <button type="button" class="dz-button">Déposez des fichiers ici ou cliquez pour les télécharger.</button><br>
                                            <span class="note needsclick">(Il ne s’agit que d’une zone de dépôt de démonstration. Les fichiers sélectionnés
                                                <strong>ne sont pas</strong> réellement téléchargés.)</span>
                                        </div>



                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <div class="col-sm-12 col-12">
                        <div class="custom-btn-group flex-end">
                            <a href="catégorie.index" type="button" class="btn btn-light">Annuler</a>                           
                            <button type="submit" class="btn btn-success" >ajouter</button>            
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>


		<!-- Dropzone JS -->
		<script src="assets/vendor/dropzone/dropzone.min.js"></script>

@endsection
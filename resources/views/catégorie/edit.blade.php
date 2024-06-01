@extends('layouts.master')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="index.html">Domicile</a>
    </li>
    <li class="breadcrumb-item">Catégorie</li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">Editer Catégorie</li>
</ol>
@endsection
@section('main')

<style>
    #demo-upload {
        border: none !important;
    }
</style>
<div class="row">
    @include('shared.success-message')
    <div class="col-sm-12 col-12">
        <div class="card">

            <div class="card-body">
                <form action="{{route('catégorie.update',$cat->id)}}" id="demo-upload" class="dropzone" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Editer votre catégorie</div>
                            <div class="card-border-body">

                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label for="categorie_name" class="form-label">Id de la Catégorie </label>
                                            <input id="categorie_name" name="categorie_Id" value="{{$cat->id}}" type="text" class="form-control" placeholder="Entrez le nom de la catégorie"  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="categorie_name" class="form-label">Nom de la Catégorie </label>
                                            <input id="categorie_name" name="categorie_name" value="{{$cat->nom}}" type="text" class="form-control" placeholder="Entrez le nom de la catégorie"  >
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-12 col-12">
                        <div class="custom-btn-group flex-end">
                            <a href="{{route('catégorie.index')}}" type="button" class="btn btn-light">Annuler</a>
                            <button type="submit" class="btn btn-success" >Modifier</button>
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

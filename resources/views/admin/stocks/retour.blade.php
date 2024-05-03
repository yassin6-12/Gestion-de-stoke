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
        <a href="#" type="button" class="btn btn-primary" id="add-category">Ajouter des articles retournés</a>
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
            <tr>
                <td style="vertical-align: middle;">#SKUN111</td>
                <td style="vertical-align: middle;">Oculus</td>
                <td style="vertical-align: middle;"><div class="d-flex align-items-center">
                    <img src="assets/images/flags/1x1/gb.svg" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                    <span>yassien</span>
                </div></td>
                <td style="vertical-align: middle;">Accessoire de jeu</td>
                <td style="vertical-align: middle;">13 juin 2021</td>
                <td style="vertical-align: middle;"> 
                    <button class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier la catégorie">
                    <i class="bi bi-pencil"></i>
                  </button> 
                  <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer la catégorie">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
            </tr>
        </tbody>
    </table>
</main>
  </div>
  
@endsection
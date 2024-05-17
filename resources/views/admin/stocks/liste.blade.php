@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Catégorie</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">liste des stocks</li>
    </ol>
@endsection
@section('main')
<div class="container">
    <h2>Liste d’inventaire des stocks</h2> 
  <main class="container mt-5">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">PRODUITS</th>
                <th scope="col">CATEGORIE</th>
                <th scope="col">DATE AJOUTÉE</th>
                <th scope="col">STOCK</th>
                <th scope="col">COULEUR</th>
                <th scope="col">ÉTAT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="vertical-align: middle;">#SKUN111</td>
                <td style="vertical-align: middle;">
                    <div class="d-flex align-items-center">
                        <img src="assets/images/flags/1x1/gb.svg" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                        <span>Oculus VR</span>
                    </div>
                </td>
                <td style="vertical-align: middle;">Oculus VR</td>
                <td style="vertical-align: middle;">Accessoire de jeu</td>
                <td style="vertical-align: middle;">13 juin 2021</td>
                <td style="vertical-align: middle;">1455</td>
                <td style="vertical-align: middle;">Jaune</td>
                <td style="vertical-align: middle;">En traitement</td>
            </tr>
        </tbody>
    </table>
</main>
  </div>
  
@endsection
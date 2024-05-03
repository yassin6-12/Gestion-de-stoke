@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Catégorie</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">liste des catégories</li>
    </ol>
@endsection
@section('main')
<div class="container">
    <h2>Liste d’inventaire des stocks</h2>
    <table class="table table-striped table-bordered">
      
        <tr>
          <th>ID</th>
          <th>Produits</th>
          <th>Catégorie</th>
          <th>Date d’ajout</th>
          <th>Stock</th>
        </tr>
      
      <tbody>
    </table>
  </div>
  
@endsection
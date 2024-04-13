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
    <h2>Liste des catégories</h2>
    <button type="button" class="btn btn-primary" id="add-category">Ajouter une catégorie</button>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Catégorie</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($categories as $cat)
          <td>{{$cat->id}}</td>
          <td>{{$cat->nom}}</td>
          <td>{{$cat->created_at}}</td>
          <td class="action">
            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier la catégorie">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer la catégorie">
              <i class="bi bi-trash"></i>
            </a>
          </td>
          @endforeach
        </tr>
        </tbody>
    </table>
  </div>
  
@endsection
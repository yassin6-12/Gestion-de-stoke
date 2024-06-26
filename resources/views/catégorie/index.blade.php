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
    @include('shared.success-message')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-3">Liste des catégories</h2>
        <a href="{{ Route('catégorie.create')}}" type="button" class="btn btn-primary" id="add-category">Ajouter une catégorie</a>
    </div>

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
            @foreach($categories as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->nom}}</td>
                <td>{{$cat->created_at}}</td>
                <td class="action">
                    <div class= "custom-btn-group flex-end">
                        <form action="{{Route('catégorie.edit', $cat->id)}}" method = "GET">
                            @csrf
                            <button class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier la catégorie">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </form>
                        <form action="{{Route('catégorie.destroy', $cat->id)}}" method = "POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer la catégorie">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
{{-- @section('script')
    <script>
      $(document).ready(function(){
        $('#submit-add-client').click(function(){
            $('#form-add-client').submit();
        })

        $('.submit-update-client').click(function(){
            $('.form-update-client-'+$(this).data('id')).submit();
        })
      })
    </script>
@endsection --}}


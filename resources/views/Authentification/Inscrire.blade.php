@extends('layouts.master')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="index.html">Domicile</a>
    </li>
    <li class="breadcrumb-item">Authentification</li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">S’inscrire</li>
</ol>
@endsection
@section('main')


<div class="container mt-5">
    @if (Auth::user() && Auth::user()->type_user == 'admin')
        <h2>Inscription Nouveau Utilisateur</h2>
    @else
        <h2>Inscription Client</h2>
    @endif

    <form class="form mt-5" action="{{ route('Inscription.new') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
            @error('prenom')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="civilite">Civilité:</label>
            <select class="form-control" id="civilite" name="civilite" required>
                <option value="M">M.</option>
                <option value="Mme">Mme</option>
                <option value="Mlle">Mlle</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tel">Téléphone:</label>
            <input type="tel" class="form-control" id="tel" name="tel" required>
            @error('tel')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
            @error('adresse')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        @if (!Auth::user() || Auth::user()->type_user == 'admin')
            <div class="form-group">
                <label for="type_user">Type</label>
                <select name="type_user" id="type_user" class="form-select">
                    <option hidden>Choisissez le type d'utilisateur</option>
                    <option value="admin">Admin</option>
                    <option value="gestionaire">Gestionnaire</option>
                </select>
                @error('type_user')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                @enderror
            </div>
        @else
            <input type="hidden" name="type_user" value="client">
        @endif
        <div class="form-group mt-3">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
            @error('photo')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Inscrire</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

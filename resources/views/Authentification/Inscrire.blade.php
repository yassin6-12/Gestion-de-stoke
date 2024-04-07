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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Gestionnaire</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Inscription Gestionnaire</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
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
        </div>
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Inscrire</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

@endsection
@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="index.html">Domicile</a>
    </li>
    <li class="breadcrumb-item">Authentification</li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">Liste des employés</li>
</ol>
@endsection

@section('main')
<div class="container">
    @include('shared.delEmp-success-message')
    @include('shared.updateEmp-success-message')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-3">Informations sur les employés</h2>
        <a href="{{route("Inscription")}}">
            <button type="button" class="btn btn-primary" id="add-category" data-bs-toggle="modal" data-bs-target="#ModalDeleteItem">Ajouter des employés</button>
        </a>
    </div>
    <main class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">TÉLÉPHONE</th>
                    <th scope="col">ADRESSE</th>
                    <th scope="col">CIVILITE</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td style="vertical-align: middle;">{{ $user->id }}</td>
                        <td style="vertical-align: middle;">{{ $user->name }}</td>
                        <td style="vertical-align: middle;">{{ $user->prenom }}</td>
                        <td style="vertical-align: middle;">{{ $user->email }}</td>
                        <td style="vertical-align: middle;">{{ $user->tel}}</td>
                        <td style="vertical-align: middle;">{{ $user->adresse }}</td>
                        <td style="vertical-align: middle;">{{ $user->civilite }}</td>
                        <td style="vertical-align: middle;">{{ $user->type_user }}</td>
                        <td style="vertical-align: middle;">
                            <button type="button" class="btn btn-sm btn-info edit-user" data-user="{{ json_encode($user) }}" data-bs-toggle="modal" data-bs-target="#ModalEditItem">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer l'utilisateur">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade mt-5" id="ModalEditItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" id="editUserId">
                            <div class="row mb-4">
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Nom</label>
                                    <input type="text" name="nom" id="editNom" class="form-control">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Prenom</label>
                                    <input type="text" name="prenom" id="editPrenom" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Email</label>
                                    <input type="email" name="email" id="editEmail" class="form-control">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Téléphone</label>
                                    <input type="text" name="telephone" id="editTelephone" class="form-control">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="fw-bold my-2">Adresse</label>
                                <input type="text" name="adresse" id="editAdresse" class="form-control">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Type</label>
                                    <select name="type" id="editType" class="form-select">
                                        <option value="admin">admin</option>
                                        <option value="gestionaire">gestionaire</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Civilité</label>
                                    <select name="civilite" id="editCivilite" class="form-select">
                                        <option value="Mr">Mr</option>
                                        <option value="Mme">Mme</option>
                                        <option value="Mlle">Mlle</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="saveChanges">Valider</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-user');
        var editUserForm = document.getElementById('editUserForm');
        var saveChangesButton = document.getElementById('saveChanges');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var user = JSON.parse(this.getAttribute('data-user'));
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editNom').value = user.name;
                document.getElementById('editPrenom').value = user.prenom;
                document.getElementById('editEmail').value = user.email;
                document.getElementById('editTelephone').value = user.tel;
                document.getElementById('editAdresse').value = user.adresse;
                document.getElementById('editType').value = user.type_user;
                document.getElementById('editCivilite').value = user.civilite;
                editUserForm.action = `/users/${user.id}`;
            });
        });

        saveChangesButton.addEventListener('click', function () {
            editUserForm.submit();
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

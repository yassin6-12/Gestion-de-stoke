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
        <h2 class="mb-3">Informations sur les clients</h2>
        <button type="button" class="btn btn-primary" id="add-category" data-bs-toggle="modal" data-bs-target="#ModalDeleteItem">Ajouter des clients</button>
    </div>
    {{---------- box pour ajouter des client ----------}}
      <div class="modal fade mt-5" id="ModalDeleteItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm-4 modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter des clients</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    <input type="hidden" name="type_user" value="client">
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
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
          </div>
        </div>
      </div>

  <main class="container mt-5">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CLIENT</th>
                <th scope="col">DATE D’INSCRIPTION</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TÉLÉPHONE</th>
                <th scope="col">VILLES</th>
                <th scope="col">TOTALE</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
              <tr>
                  <td style="vertical-align: middle;">#{{$client->id}}</td>
                  <td style="vertical-align: middle;"><div class="d-flex align-items-center">
                    <img src="{{asset('storage/' .$client->photo)}}" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                </div></td>
                <td style="vertical-align: middle;">{{$client->created_at}}</td>
                <td style="vertical-align: middle;">{{$client->email}}</td>
                <td style="vertical-align: middle;">{{$client->tel}}</td>
                <td style="vertical-align: middle;">{{$client->city}}</td>
                <td style="vertical-align: middle;">Not Yet</td>
                <td style="vertical-align: middle;"> 
                  <button type="button" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#ModalEditClient-{{$client->id}}">
                    <i class="bi bi-pencil"></i>
                  </button> 
                  {{------------ box de modification  ------------}}
                  <div class="modal fade mt-5" id="ModalEditClient-{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Info Client</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="form mt-5" action="{{ route('updateClient',$client->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$client->id}}">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}" required>
                                @error('email')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Let it empty if you won\'t to modify">
                                @error('password')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}" required>
                                @error('name')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom:</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="{{$client->prenom}}" required>
                                @error('prenom')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="civilite">Civilité:</label>
                                <select class="form-control" id="civilite" name="civilite" required>
                                    <option value="M" @php
                                        if($client->civilite == 'M')
                                          echo ' checked ';
                                    @endphp>M.</option>
                                    <option value="Mme" @php
                                    if($client->civilite == 'Mme')
                                      echo ' checked ';
                                @endphp>>Mme</option>
                                    <option value="Mlle" @php
                                    if($client->civilite == 'Mlle')
                                      echo ' checked ';
                                @endphp>>Mlle</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tel">Téléphone:</label>
                                <input type="tel" class="form-control" id="tel" name="tel" value="{{$client->tel}}" required>
                                @error('tel')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse:</label>
                                <textarea class="form-control" id="adresse" name="adresse" rows="3" required>{{$client->adresse}}</textarea>
                                @error('adresse')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                                @enderror
                            </div>
                                <input type="hidden" name="type_user" value="client">
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form action="{{route('destroyClient',$client->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class=" btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer le client">
                        <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
  </div>

  <!-- Button trigger modal -->
  
@endsection
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
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
    @endif
    {{---------- box pour ajouter des client ----------}}
      <div class="modal fade mt-5" id="ModalDeleteItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm-4">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter des clients</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('clientele.store')}}" method="POST" id="form-add-client" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="fw-bold my-2">Nom de Client</label>
                    <input type="text" name="client-username" class="form-control">
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Photo de Client</label>
                        <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="fw-bold my-2">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control">
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Téléphone</label>
                        <input type="tel" name="phone" id="phone" class="form-control">
                    </div>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="button" id="submit-add-client" class="btn btn-primary">Ajouter</button>
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
                <td style="vertical-align: middle;">
                  <div class="d-flex align-items-center">
                      @if (!empty($client->photo))
                        @php
                            $imageUrl = Storage::url($client->photo);
                        @endphp
                        <img src="{{$imageUrl}}" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                      @endif

                      <span>
                          @if (!empty($client->name))
                            {{$client->name}}
                            @else
                            {{$client->nom_utilisateur}}
                          @endif
                      </span>
                  </div>
              </td>
              <td style="vertical-align: middle;">{{$client->created_at->format('Y-m-d')}}</td>
              <td style="vertical-align: middle;">@if (!empty($client->email))
                  {{$client->email}}
              @endif</td>
              <td style="vertical-align: middle;">{{$client->tel}}</td>
              <td style="vertical-align: middle;">{{$client->city}}</td>
              <td style="vertical-align: middle;">0</td>
              <td style="vertical-align: middle;">
                <button type="button" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#ModalEditClient-{{$client->id}}">
                  <i class="bi bi-pencil"></i>
                </button>

                <div class="modal fade mt-5" id="ModalEditClient-{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Client</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('clientele.update',$client->id)}}" method="POST" class="form-update-client-{{$client->id}}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="mb-4">
                              <label class="fw-bold my-2">Nom d'utilisateur</label>
                              <input type="text" name="client-username" value="{{$client->nom_utilisateur}}" class="form-control">
                          </div>
                          <div class="row mb-4">
                              <div class="col-12 col-md-6">
                                  <label class="fw-bold my-2">Profil des clients</label>
                                  <input type="file" class="form-control-file"  id="photo" name="photo" accept="image/*" required>
                              </div>
                          </div>
                          <div class="mb-4">
                              <label class="fw-bold my-2">Villes</label>
                              <input type="text" name="ville" id="ville" value="{{$client->city}}" class="form-control">
                          </div>
                          <div class="row mb-4">
                              <div class="col-12 col-md-6">
                                  <label class="fw-bold my-2">Email</label>

                                  <input type="email" name="email" id="email" value="@if (!empty($client->email))
                                      {{$client->email}}
                                  @endif" class="form-control">
                              </div>
                              <div class="col-12 col-md-6">
                                  <label class="fw-bold my-2">Téléphone</label>
                                  <input type="tel" name="phone" id="phone" value="{{$client->tel}}" class="form-control">
                              </div>
                          </div>

                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" data-id="{{$client->id}}" class="btn btn-primary submit-update-client">Modifier</button>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="{{route('clientele.destroy',$client->id)}}" method="POST" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit"  class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer le client">
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
@section('script')
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
@endsection

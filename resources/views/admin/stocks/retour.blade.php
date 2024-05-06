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
        <button type="button" class="btn btn-primary" id="add-category" data-bs-toggle="modal" data-bs-target="#ModalDeleteItem">Ajouter des articles retournés</button>
    </div>
    
      <div class="modal fade mt-5" id="ModalDeleteItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Return Item</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" id="form-ajouter-produiter-retourner">
                @csrf
                <div class="mb-4">
                    <label class="fw-bold my-2">Item</label>
                    <input type="text" name="item-name" class="form-control">
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Customer</label>
                        <select name="item-customer" class="form-select">
                            <option value="1">Phil Glover</option>
                            <option value="2">yacine</option>
                            <option value="3">newfel</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="fw-bold my-2">Return Date</label>
                        <input type="date" name="item-date-return" id="" class="form-control">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="fw-bold my-2">Total</label>
                    <input type="text" name="item-total" id="" class="form-control">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="ajouter-produit-retourner">Ajouter</button>
            </div>
          </div>
        </div>
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
                <td style="vertical-align: middle;">Accessoire de jeu</td>
                <td style="vertical-align: middle;"><div class="d-flex align-items-center">
                    <img src="assets/images/flags/1x1/gb.svg" alt="Oculus VR" class="img-thumbnail" width="50" style="margin-right: 10px;">
                    <span>yassien</span>
                </div></td>
                <td style="vertical-align: middle;">13 juin 2021</td>
                <td style="vertical-align: middle;">$150</td>
                <td style="vertical-align: middle;"> 
                  <button type="button" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#ModalEditItem">
                    <i class="bi bi-pencil"></i>
                  </button> 
                  <div class="modal fade mt-5" id="ModalEditItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Return Item</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="fw-bold my-2">Item</label>
                                <input type="text" name="item-name" class="form-control">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Customer</label>
                                    <select name="item-customer" class="form-select">
                                        <option value="1">Phil Glover</option>
                                        <option value="2">yacine</option>
                                        <option value="3">newfel</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="fw-bold my-2">Return Date</label>
                                    <input type="date" name="item-date-return" id="" class="form-control">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="fw-bold my-2">Total</label>
                                <input type="text" name="item-total" id="" class="form-control">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Ajouter</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form action="" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELTE')
                    <a type="submit"  class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer la catégorie">
                        <i class="bi bi-trash"></i>
                    </a>
                  </form>
                </td>
            </tr>
        </tbody>
    </table>
</main>
  </div>

  <!-- Button trigger modal -->
  
@endsection
@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Détails de facturation</li>
    </ol>
@endsection
@section('main')
<div class="row">
							<div class="col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Détails de facturation</div>
									</div>
									<div class="card-body">

										<!-- Row start -->
										<div class="row">
											<div class="col-xxl-8 col-sm-8 col-12">
												<!-- Row start -->
												<form action="{{route('dfacture')}}" method="POST" id="form-facture-to-dfacture">
												@csrf
												@php
													$idProducts = array();
													foreach($products as $product){
														array_push($idProducts,$product->id);
													}
												@endphp
												<input type="hidden" name="products" value="{{json_encode($idProducts)}}" />
												<input type="hidden" name="quantities" value="{{json_encode($quantities)}}">
												<div class="row">
												
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Prénom</label>
															<input type="text" class="form-control" name="prenom">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Nom</label>
															<input type="text" class="form-control" name="nom">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Sélectionner un nom utilisateur</label>
															<select class="form-select" name="client">
																@foreach ($clients as $client)
																	<option value="{{$client->id}}">{{$client->name}}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Sélectionner une ville</label>
															<select class="form-select" name="ville">
																<option hidden>Sélectionner une ville</option>
																<option value="tlemcen">tlemcen</option>
																<option value="oran">oran</option>
																<option value="alger">alger</option>
																<option value="tipaza">tipaza</option>
																<option value="mostaganem">mostaganem</option>
															</select>
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Téléphone</label>
															<input type="tel" class="form-control" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Messagerie électronique </label>
															<input type="email" class="form-control" name="email" value="info@example.com">
														</div>
													</div>
													<div class="col-sm-12 col-12">
														<div class="mb-2">
															<label class="form-label">Remarques sur votre commande</label>
															<textarea rows="3" class="form-control" name="note"></textarea>
														</div>
													</div>
												
												</div>
												</form>
												<!-- Row end -->
											</div>
											<div class="col-sm-4 col-12">

												<!-- Products List -->
												<div class="product-list-card" id="product-list">
													<h5>Liste des commandes</h5>
													@php
														$i = 0;
														$total = 0;
													@endphp
													@foreach ($products as $product)
														@php
															$firstImage = json_decode($product->images)[0];
														@endphp
														<div class="product-list-block">
															<img class="product-list-img" style="width:100px;" src="{{asset($firstImage)}}" alt="Moonlight Admin">
															<div class="product-list-details">
																<h5 class="product-list-title">{{$product->nom}}</h5>
																<div class="product-list-price">${{$product->prix - ($product->prix * $product->remise/100)}} * {{$quantities[$i]}}</div>
															</div>
														</div>
														@php
															$total += (($product->prix - ($product->prix * $product->remise/100)) * $quantities[$i]);
															$i++;
														@endphp
													@endforeach
												</div>
												<div class="mb-2">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="paymentRadio" id="paymentRadio1">
														<label class="form-check-label" for="paymentRadio1">Paypal</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="paymentRadio" id="paymentRadio2"
															checked="">
														<label class="form-check-label" for="paymentRadio2">Cash On Delivery</label>
													</div>
												</div>

											</div>
										</div>
										<!-- Row end -->

										<!-- Row start -->
										<div class="row">
											<div class="col-xxl-12">
												<div class="sub-total-container">
													<div class="total">Total de la commande: ${{$total}}</div>
													<button type="submit" class="btn btn-success btn-lg" id="btn-form-facture">Passer la commande</button>
												</div>
											</div>
										</div>
										<!-- Row end -->

									</div>
								</div>
							</div>
						</div>
						<script>
							window.addEventListener('DOMContentLoaded', (event) => {
								const productList = document.getElementById('product-list');
								const productBlocks = productList.querySelectorAll('.product-list-block');
								
								if (productBlocks.length > 3) {
									productList.style.height = '310px'; // Définir la hauteur fixe
									productList.style.overflowY = 'auto'; // Activer le défilement vertical
								}
							});
						</script>
@endsection
@section('script')
	<script>
		$('#btn-form-facture').click(function(e){
			$('#form-facture-to-dfacture').submit()
		})
	</script>
@endsection
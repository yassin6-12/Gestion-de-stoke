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
												<div class="row">
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Prénom</label>
															<input type="text" class="form-control" value="Abigale">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Nom</label>
															<input type="text" class="form-control" value="Heaney">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Sélectionner un nom utilisateur</label>
															<select class="form-select">
																<option value="">Nom Utilisateur</option>
																<option value="" selected="">USA</option>
																<option value="">Belcine</option>
																<option value="">mokamin</option>
																<option value="">lazanewfel</option>
																<option value="">United Kingdom</option>
															</select>
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Sélectionner une ville</label>
															<select class="form-select">
																<option value="">Sélectionner une ville</option>
																<option value="" selected="">USA</option>
																<option value="">Brazil</option>
																<option value="">India</option>
																<option value="">Indonesia</option>
																<option value="">United Kingdom</option>
															</select>
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Téléphone</label>
															<input type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Messagerie électronique </label>
															<input type="email" class="form-control" value="info@example.com">
														</div>
													</div>
													<div class="col-sm-12 col-12">
														<div class="mb-2">
															<label class="form-label">Remarques sur votre commande</label>
															<textarea rows="3" class="form-control"></textarea>
														</div>
													</div>
													
												</div>
												<!-- Row end -->
											</div>
											<div class="col-sm-4 col-12">

												<!-- Products List -->
												<div class="product-list-card" id="product-list">
													<h5>Liste des commandes</h5>
													<div class="product-list-block">
														<img class="product-list-img" src="assets/images/food/img7.jpg" alt="Moonlight Admin">
														<div class="product-list-details">
															<h5 class="product-list-title">Barbecue Chicken Salad</h5>
															<div class="product-list-price">$25.00</div>
														</div>
													</div>
													
													<div class="product-list-block">
														<img class="product-list-img" src="assets/images/food/img9.jpg" alt="Moonlight Admin">
														<div class="product-list-details">
															<h5 class="product-list-title">Harvest Cobb Salad</h5>
															<div class="product-list-price">$15.00</div>
														</div>
													</div>
													<div class="product-list-block">
														<img class="product-list-img" src="assets/images/food/img2.jpg" alt="Moonlight Admin">
														<div class="product-list-details">
															<h5 class="product-list-title">Greek Salad</h5>
															<div class="product-list-price">$28.00</div>
														</div>
													</div>
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
													<div class="total">Total de la commande: $90.00</div>
													<a href="{{route('dfacture')}}" class="btn btn-success btn-lg">Passer la commande</a>
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
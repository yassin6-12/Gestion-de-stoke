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
															<label class="form-label">Last Name</label>
															<input type="text" class="form-control" value="Heaney">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Company Name</label>
															<input type="text" class="form-control" value="Moonlight">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">House No</label>
															<input type="text" class="form-control" value="27-950">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Select Country</label>
															<select class="form-select">
																<option value="">Select Country</option>
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
															<label class="form-label">Select City</label>
															<select class="form-select">
																<option value="">Select City</option>
																<option value="" selected="">Chicago</option>
																<option value="">San Diego</option>
																<option value="">Houston</option>
																<option value="">New York</option>
																<option value="">Los Angeles</option>
															</select>
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Postal Code</label>
															<input type="text" class="form-control" value="98980">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Phone</label>
															<input type="text" class="form-control" value="0000-0000-00">
														</div>
													</div>
													<div class="col-sm-4 col-12">
														<div class="mb-3">
															<label class="form-label">Email </label>
															<input type="email" class="form-control" value="info@example.com">
														</div>
													</div>
													<div class="col-sm-12 col-12">
														<div class="mb-2">
															<label class="form-label">Notes about your order</label>
															<textarea rows="3" class="form-control">Quick Delivery</textarea>
														</div>
													</div>
													<div class="col-sm-12 col-12">
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" checked="">
															<label class="form-check-label">Save this Address</label>
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
													<div class="product-list-block">
														<img class="product-list-img" src="assets/images/food/img6.jpg" alt="Moonlight Admin">
														<div class="product-list-details">
															<h5 class="product-list-title">Garden Chickpea Salad</h5>
															<div class="product-list-price">$22.00</div>
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
													<div class="total">Order Total: $90.00</div>
													<a href="thank-you.html" class="btn btn-success btn-lg">Place Order</a>
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
								
								if (productBlocks.length > 4) {
									productList.style.height = '410px'; // Définir la hauteur fixe
									productList.style.overflowY = 'auto'; // Activer le défilement vertical
								}
							});
						</script>
@endsection
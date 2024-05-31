@extends('layouts.master')
@section('breadcrumb')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<i class="bi bi-house"></i>
		<a href="/">Domicile
		</a>
	</li>
	<li class="breadcrumb-item breadcrumb-active" aria-current="page">Commerce électronique</li>
</ol>
@endsection
@section('main')
<div class="content-wrapper">
    @include('shared.success-message')
						<!-- Row start -->
						<div class="row">
							<div class="col-sm-4 col-12">
								<div class="stats-tile">
									<div class="sale-icon-bdr">
										<i class="bi bi-bag"></i>
									</div>
									<div class="sale-details">
										<h5>Products</h5>
										<h3 class="text-blue">{{$productcount}}</h3>
										<p class="growth text-blue"></p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-12">
								<div class="stats-tile">
									<div class="sale-icon-bdr">
										<i class="bi bi-person-fill-gear"></i>
									</div>
									<div class="sale-details">
										<h5>Admins</h5>
										<h3 class="text-blue">{{$admincount}}</h3>
										<p class="growth text-blue"></p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-12">
								<div class="stats-tile">
									<div class="sale-icon-bdr">
										<i class="bi bi-person-lines-fill"></i>
									</div>
									<div class="sale-details">
										<h5>Gestionnaire</h5>
										<h3 class="text-blue">{{$gestcount}}</h3>
										<p class="growth text-red"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row">
							<div class="col-xxl-9  col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Orders &amp; Revenue</div>
									</div>
									<div class="card-body">
										<div id="ordersVisits"></div>
									</div>
								</div>
							</div>
							<div class="col-xxl-3  col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Visitors</div>
									</div>
									<div class="card-body">
										<div id="visitors"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row">
							<div class="col-xxl-6 col-sm-12 col-12">
								<div class="card">
									<div class="card-body">

										<!-- Row start -->
										<div class="row">
											<div class="col-sm-6 col-12">
												<div class="stats-tile2-container">
													<div class="stats-tile2">
														<div class="sale-icon">
															<i class="bi bi-pie-chart text-yellow"></i>
														</div>
														<div class="sale-details">
															<h5>Clients</h5>
															<p class="growth">{{$clientcount}}</p>
														</div>
													</div>
													<div class="stats-tile2">
														<div class="sale-icon">
															<i class="bi bi-pie-chart text-green"></i>
														</div>
														<div class="sale-details">
															<h5>Gestionnaire</h5>
															<p class="growth">{{$gestcount}}</p>
														</div>
													</div>
													<div class="stats-tile2">
														<div class="sale-icon">
															<i class="bi bi-pie-chart text-blue"></i>
														</div>
														<div class="sale-details">
															<h5>Admins</h5>
															<p class="growth ">{{$admincount}}</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-12">
												{!! $chart->container() !!}

                                                {!! $chart->script() !!}
											</div>
										</div>
										<!-- Row end -->

									</div>
								</div>
							</div>
							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Logs</div>
									</div>
									<div class="card-body">
										<div class="scroll300">
											<div class="logs">
												<div class="log-list">
													<div class="log-dot"></div>
													<div class="log-title">New item sold</div>
													<div class="log-time">10:10</div>
												</div>
												<div class="log-list">
													<div class="log-dot yellow"></div>
													<div class="log-title">Notification from bank</div>
													<div class="log-time">05:25</div>
												</div>
												<div class="log-list">
													<div class="log-dot"></div>
													<div class="log-title">Transaction success alert</div>
													<div class="log-time">09:45</div>
												</div>
												<div class="log-list">
													<div class="log-dot red"></div>
													<div class="log-title">Your item has been updated</div>
													<div class="log-time">06:50</div>
												</div>
												<div class="log-list">
													<div class="log-dot green"></div>
													<div class="log-title">New order</div>
													<div class="log-time">12:30</div>
												</div>
												<div class="log-list">
													<div class="log-dot yellow"></div>
													<div class="log-title">Item bought</div>
													<div class="log-time">04:22</div>
												</div>
												<div class="log-list">
													<div class="log-dot"></div>
													<div class="log-title">New sale: Messi Wills</div>
													<div class="log-time">10:10</div>
												</div>
												<div class="log-list">
													<div class="log-dot red"></div>
													<div class="log-title">Order received</div>
													<div class="log-time">12:55</div>
												</div>
												<div class="log-list">
													<div class="log-dot green"></div>
													<div class="log-title">Service information</div>
													<div class="log-time">09:12</div>
												</div>
												<div class="log-list">
													<div class="log-dot"></div>
													<div class="log-title">Message from Wilson</div>
													<div class="log-time">09:27</div>
												</div>
												<div class="log-list">
													<div class="log-dot red"></div>
													<div class="log-title">New item sale: Joy Root</div>
													<div class="log-time">02:39</div>
												</div>
												<div class="log-list">
													<div class="log-dot"></div>
													<div class="log-title">Product update</div>
													<div class="log-time">08:22</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Keywords</div>
									</div>
									<div class="card-body">
										<div id="tagscloud">
											<a href="analytics.html" class="tagc1">Liste des clients</a>
											<a href="/produit" class="tagc4">Liste des Produits</a>
											<a href="/produit/create" class="tagc3">Ajouter Produit</a>
											<a href="/catégorie" class="tagc4">Liste des catégories</a>
											<a href="/catégorie/create" class="tagc5">Ajouter Catégorie</a>
											<a href="/Authentification.Inscrire" class="tagc3">Inscription</a>
											<a href="/" class="tagc2">Dashboard</a>
                                            <a href="/Authentification.Inscrire" class="tagc3">Inscription</a>
											<a href="/admin.stocks.liste" class="tagc1">Liste des stocks</a>
											<a href="/Authentification.Seconnecter" class="tagc2">Connexion</a>
                                            <a href="/" class="tagc2">Dashboard</a>
											<a href="/Authentification.liste" class="tagc1">Employés</a>
											<a href="/" class="tagc1">Dashboard</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row">
							<div class="col-xxl-8 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Earnings</div>
									</div>
									<div class="card-body">
										<!-- Row start -->
										<div class="row">
											<div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
												<div id="world-map-markers2" class="chart-height"></div>
											</div>
											<div class="col-sm-5 col-12">
												<div class="global-sales">
													<h3><i class="bi bi-globe icon"></i>$2,75,000 <i class="bi bi-arrow-up-right text-green"></i>
													</h3>
													<p>This dashboard unquestionably the largest visitors in the world with TWO million monthly
														active users and ONE million daily active.</p>
												</div>
											</div>
										</div>
										<!-- Row end -->
									</div>
								</div>
							</div>
							<div class="col-xxl-4 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Top Items Sold</div>
									</div>
									<div class="card-body">
										<div class="scroll250">
											<ul class="recent-orders">
												<li>
													<div class="order-img">
														<img src="assets/images/food/img1.jpg" alt="Bootstrap Gallery">
														<span class="badge shade-green">700 Sold</span>
													</div>
													<div class="order-details">
														<h5 class="order-title">The Original Creamy Pasta</h5>
														<p class="order-desc">Wedding cake with Macarons.</p>
														<p class="order-revenue">Revenue: <span>$35,650.00</span></p>
													</div>
												</li>
												<li>
													<div class="order-img">
														<img src="assets/images/food/img3.jpg" alt="Bootstrap Gallery">
														<span class="badge shade-red">650 Sold</span>
													</div>
													<div class="order-details">
														<h5 class="order-title">Shredded Sprout Salad</h5>
														<p class="order-desc">A mix of jammy roasted cherry tomatoes</p>
														<p class="order-revenue">Revenue: <span>$32,109.00</span></p>
													</div>
												</li>
												<li>
													<div class="order-img">
														<img src="assets/images/food/img4.jpg" alt="Bootstrap Gallery">
														<span class="badge shade-green">500 Sold</span>
													</div>
													<div class="order-details">
														<h5 class="order-title">Double Stacker</h5>
														<p class="order-desc">Homemade cheese with green veggies and avocado.</p>
														<p class="order-revenue">Revenue: <span>$27,201.00</span></p>
													</div>
												</li>
												<li>
													<div class="order-img">
														<img src="assets/images/food/img5.jpg" alt="Bootstrap Gallery">
														<span class="badge shade-green">410 Sold</span>
													</div>
													<div class="order-details">
														<h5 class="order-title">Veggie Burger</h5>
														<p class="order-desc">A combination of corn, Cotija, and cilantro.</p>
														<p class="order-revenue">Revenue: <span>$22,352.00</span></p>
													</div>
												</li>
												<li>
													<div class="order-img">
														<img src="assets/images/food/img6.jpg" alt="Bootstrap Gallery">
														<span class="badge shade-red">370 Sold</span>
													</div>
													<div class="order-details">
														<h5 class="order-title">Teriyaki Burger</h5>
														<p class="order-desc">Juicy peaches, tomatoes, crisp corn, and fresh basil.</p>
														<p class="order-revenue">Revenue: <span>$18,485.00</span></p>
													</div>
												</li>
												<li>
													<div class="order-img">
														<img src="assets/images/food/img2.jpg" alt="Bootstrap Gallery">
														<span class="badge shade-green">220 Sold</span>
													</div>
													<div class="order-details">
														<h5 class="order-title">Smoque Bistro</h5>
														<p class="order-desc">Mix of gastropub style food,such as BBQ meat nachos.</p>
														<p class="order-revenue">Revenue: <span>$14,123.00</span></p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
					</div>


@endsection

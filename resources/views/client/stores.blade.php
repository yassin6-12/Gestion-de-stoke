
<?php 
	use App\Models\produit;
	use App\Models\Categorie;
?>
@extends('client.layouts.master')
@section('main')
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{route('electro.index')}}" class="text-decoration-none">Home</a></li>
							<li><a href="{{route('electro.stores')}}" class="text-decoration-none">All Categories</a></li>
							@if ($category)
									<li class="text-capitalize"><a href="{{route('electro.stores',['category'=>$category->id])}}" class="text-decoration-none">{{$category->nom}}</a></li>
									@if (isset($_GET['min_price']) && isset($_GET['max_price']))
										<span style="font-size:.8rem;" class="text-danger d-inline-block ms-5"><?php echo $_GET['min_price'] ?> < price < <?php echo $_GET['max_price'] ?></span>
									@endif
							@endif
							
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<form action="{{route('electro.stores')}}" method="get">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
								@if (count($allCats))
								@foreach ($allCats as $cat)
									@php
										$numberOfProducts = produit::where('categorie_id',$cat->id)->count();
									@endphp
									<div class="input-checkbox">
										<input type="checkbox" name="category" value="{{$cat->id}}" id="category-{{$cat->id}}">
										<label for="category-{{$cat->id}}">
											<span></span>
											{{$cat->nom}}
											<small>({{$numberOfProducts}})</small>
										</label>
									</div>
								@endforeach
								@endif
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" name="min_price" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" name="max_price" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<div class="d-grid gap-2 my-3">
							<input type="submit" class="btn btn-danger text-capitalize" value="filter">
						  </div>
						
						<!-- /aside Widget -->
						</form>
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							@php
								$products = $filterProducts?$filterProducts:$allProducts;
							@endphp
								
							
							@foreach ($products as $product)
								@php
									$getCat = Categorie::find($product->categorie_id);
									$getFirstImage = json_decode($product->images)[0];
								@endphp
								<div class="col-md-4 col-xs-6">
									<div class="product">
										<div class="product-img">
											<div style="height:200px">
												<img src="{{asset($getFirstImage)}}" alt="image of {{$product->nom}}" class="img-responsive" style="max-width:100%;object-fit: contain;" />
											</div>
											<div class="product-label">
												@if ($product->remise)
													<span class="sale">-{{$product->remise}}%</span>
												@endif
												
												{{-- <span class="new">NEW</span> --}}
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">{{$getCat->nom}}</p>
											<h3 class="product-name"><a href="{{route('electro.show',$product->id)}}" class="text-decoration-none">{{$product->nom}}</a></h3>
											<h4 class="product-price">
										
												${{$product->prix - ($product->prix * $product->remise / 100)}} 
												@if ($product->remise)
													<del class="product-old-price">
														${{$product->prix}}
													</del>
												@endif
												
											</h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
								</div>
								<!-- /product -->
							@endforeach
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active text-decoration-none">1</li>
								<li><a href="#" class="text-decoration-none">2</a></li>
								<li><a href="#" class="text-decoration-none">3</a></li>
								<li><a href="#" class="text-decoration-none">4</a></li>
								<li><a href="#" class="text-decoration-none"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection

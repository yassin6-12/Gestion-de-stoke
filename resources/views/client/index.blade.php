<?php 
	use App\Models\Categorie;
?>

@extends('client.layouts.master')
@section('main')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				@if (count($bestCategories))
					@foreach ($bestCategories as $category)
						<div class="col-md-4 col-xs-6">
							<div class="shop" style="height:300px;">
								<div class="shop-img h-100">
									<img src="{{asset($category->photo)}}" alt="image {{$category->nom}}" class="h-100">
								</div>
								<div class="shop-body">
									<h3 class="text-capitalize">{{$category->nom}}<br>Collection</h3>
									<a href="{{route('electro.stores',['category'=>$category->id])}}" class="cta-btn text-decoration-none">Shop now <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								{{-- @foreach ($catsName as $item)
									<div>{{$item->nom}}</div>
								@endforeach --}}
								@php $i = 1; @endphp
								@foreach ($catsName as $cat)
									<li class="<?php if($cat->id == $last[0]) echo 'active' ?>"><a href="#tab{{$i}}" class="text-decoration-none collapse-btn-product">{{$cat->nom}}</a></li>
									@php $i++; @endphp
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->
				
	
				
				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							@php $i=1; @endphp
							@foreach ($newProducts as $items)
								
							<div id="tab{{$i}}" class="tab-pane collapse @if ($i == 1) active @endif">
								<div class="products-slick" data-nav="#slick-nav-{{$i}}">
									<!-- product -->
									@foreach ($items as $item)
										<?php
											// get the first image of the product
											$firstImage = json_decode($item->images)[0];
										?>
										<div class="product">
											<div class="product-img">
												<img src="{{asset($firstImage)}}" alt="image of {{$item->nom}}" style="height:220px;">
												<div class="product-label">
													@if ($item->remise)
													<span class="sale">-{{$item->remise}}%</span>
													@endif
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												@php
													$getCatName = Categorie::where('id',$item->categorie_id)->first();
												@endphp
												<p class="product-category">{{$getCatName->nom}}</p>
												<h3 class="product-name"><a href="{{route('electro.show',$item->id)}}" class="text-decoration-none">{{$item->nom}}</a></h3>
												@if ($item->remise)
													<h4 class="product-price">${{$item->prix - ($item->prix * $item->remise /100)}} <del
														class="product-old-price">${{$item->prix}}</del>
													</h4>
												@else 
													<h4 class="product-price">${{$item->prix}}</h4>
												@endif
												
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
															class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span
															class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span
															class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn">
													<i class="fa fa-shopping-cart"></i> add to cart
												</button>
											</div>
										</div>
									@endforeach
									
								</div>
								<div id="slick-nav-{{$i}}" class="products-slick-nav"></div>
								
							</div>
							@php $i++; @endphp
							@endforeach
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	@php
		$firstImageTopDeal 		= NULl;
		if($topDeal){
			$firstImageTopDeal = json_decode($topDeal->images)[0];
		}
		
	@endphp
	@if ($firstImageTopDeal)
		<div id="hot-deal" class="section px-5" style="background-image: url('{{$firstImageTopDeal}}');">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn text-decoration-none" href="{{route('electro.show',$topDeal->id)}}">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	@endif
	<!-- /HOT DEAL SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				@if (count($topSelling))
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Top selling</h3>
						{{-- <div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab2" class="text-decoration-none">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab2" class="text-decoration-none">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab2" class="text-decoration-none">Cameras</a></li>
								<li><a data-toggle="tab" href="#tab2" class="text-decoration-none">Accessories</a></li>
							</ul>
						</div> --}}
					</div>
				</div>
				@endif
				<!-- /section title -->
				
				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-selling">
									<!-- product -->
									@foreach ($topSelling as $item)
									<?php
											// get the first image of the product
											$firstImage = json_decode($item->images)[0];
									?>
									<div class="product">
										<div class="product-img">
											<img src="{{asset($firstImage)}}" alt="image of {{$item->nom}}" style="height:220px">
											@if ($item->remise)
												<div class="product-label">
													<span class="sale">-{{$item->remise}}%</span>
												</div>
											@endif
											
										</div>
										<div class="product-body">
											@php
													$getCatName = Categorie::where('id',$item->categorie_id)->first();
												@endphp
											<p class="product-category">{{$getCatName->nom}}</p>
											<h3 class="product-name"><a href="{{route('electro.show',$item->id)}}" class="text-decoration-none">{{$item->nom}}</a></h3>
											@if ($item->remise)
												<h4 class="product-price">${{$item->prix - ($item->prix * $item->remise / 100)}} 
													<del class="product-old-price">${{$item->prix}}</del>
												</h4>
											@else
												<h4 class="product-price">${{$item->prix}} </h4>
											@endif
											
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
												cart</button>
										</div>
									</div>
									<!-- /product -->
									@endforeach
									
								</div>
								<div id="slick-nav-selling" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				@if (count($top12Selling))
					
				@for ($i = 0; $i < count($top12Selling); $i++)
					@php
						$getFirstImage = json_decode($top12Selling[$i]->images)[0];
					@endphp
					@if ($i%6 == 0)
						<div class="col-md-4 col-xs-6">
							<div class="section-title">
								<h4 class="title amine mokeddem">Top selling</h4>
								<div class="section-nav">
									<div id="slicked-nav-{{$i}}" class="products-slick-nav"></div>
								</div>
							</div>
							<div class="products-widget-slick" data-nav="#slicked-nav-{{$i}}">
					@endif
							@if ($i%3 == 0)
								<div>
							@endif
									<div class="product-widget">
										<div class="product-img">
											<img src="{{$getFirstImage}}" alt="image of {{$top12Selling[$i]->nom}}">
										</div>
										<div class="product-body">
											@php
													$getCatName = Categorie::where('id',$item->categorie_id)->first();
												@endphp
											<p class="product-category">{{$getCatName->nom}}</p>
											<h3 class="product-name"><a href="{{route('electro.show',$top12Selling[$i]->id)}}" class="text-decoration-none">{{$top12Selling[$i]->nom}}</a></h3>
											@if ($top12Selling[$i]->remise)
												<h4 class="product-price">${{$top12Selling[$i]->prix - ($top12Selling[$i]->prix * $top12Selling[$i]->remise / 100)}} <del class="product-old-price">${{$top12Selling[$i]->prix}}</del></h4>
											@else 
												<h4 class="product-price">${{$top12Selling[$i]->prix}}</h4>
											@endif
											
										</div>
									</div>
							@if ($i%3 == 2 || $i+1 == count($top12Selling))
								</div>
								
							@endif
							
					

					@if ($i%6 == 5 || $i+1 == count($top12Selling))
							</div>
						</div>
					@endif
				@endfor
				@endif

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	
@endsection

@section('script')
<script>
	$(document).ready(function(){
		$('.collapse-btn-product').click(function(){
			$('.products-tabs '+$(this).attr('href')).addClass('active').siblings('.collapse').removeClass('active');
			$(this).parent('li').addClass('active').siblings('li').removeClass('active');
		})
	})

	// remove buttons
	$('.products-tabs .products-slick-nav').each(function(index,ele){
		if(index == 2 || index == 3){
			var childs = $(this).children();
			childs[0].remove();
			childs[3].remove(); 
		}
	})

</script>
@endsection
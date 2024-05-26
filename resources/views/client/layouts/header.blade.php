@php
    use App\Models\Categorie;

    $last5Categories = Categorie::take(5)->get();
    $allCategories = Categorie::all();
@endphp

<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container d-md-flex justify-content-md-between">
            <ul class="header-links text-center text-md-left">
                <li><a href="#" class="text-decoration-none"><i class="fa fa-phone"></i> +021-00-00-00</a></li>
                <li><a href="#" class="text-decoration-none"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#" class="text-decoration-none"><i class="fa fa-map-marker"></i> 13002 Ghazaouet</a></li>
            </ul>
            <ul class="header-links my-2 my-md-0 text-center text-md-left">
                <li><a href="#" class="text-decoration-none"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="#" class="text-decoration-none"><i class="fa fa-user-o"></i> My Account</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    {{-- <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('electro.index')}}" class="logo">
                            <img src="{{asset('assetClient/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form class="row">
                            @csrf
                            <div class="col-3">
                                <select class="form-select" name="category-name">
                                    <option value="0">All Categories</option>
                                    @foreach ($allCategories as $category)
                                        <option value="{{$category->id}}">{{$category->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" placeholder="Search here">
                            </div>
                            <div class="col-2">
                                <button type="sumbit" class="search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('assetClient/img/product01.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('assetClient/img/product02.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div> --}}
    <nav class="navbar navbar-dark  navbar-expand-lg" style="background-color: #15161D">
        <div class="container">
            <a href="{{route('electro.index')}}" class="navbar-brand pe-lg-5 me-lg-5">
                <img src="{{asset('assetClient/img/logo.png')}}" alt="">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-client-side" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-client-side">
            <div class="row flex-grow-1 d-lg-flex align-items-lg-center justify-content-lg-between">
                <form class="col-lg-8 mb-3 mb-lg-0">
                    <div class="row mx-5 mx-xl-5">
                        @csrf
                        <div class="col-sm-4 p-0">
                            <select class="form-select" id="search-category" name="category-name">
                                <option value="0">All Categories</option>
                                @foreach ($allCategories as $category)
                                    <option value="{{$category->id}}">{{$category->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 p-0 my-2 my-sm-0">
                            <input type="text" class="form-control rounded-0" placeholder="Search here">
                        </div>
                        <div class="col-sm-2 p-0">
                            <div class="d-grid">
                                <button type="sumbit" class="btn btn-danger px-3" id="search-btn">Search</button>
                              </div>
                            
                        </div>
                    </div>
                </form>
                <ul class="col-lg-4 justify-content-lg-end navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                      <div class="header-ctn text-center">
                        <div>
                            <a href="#" class=" text-white text-decoration-none">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-white text-decoration-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="dropdown-menu p-0" id="dropdown-menu-mine" style="min-width:300px">
                                <div class="cart-list p-3 pb-0">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('assetClient/img/product01.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
        
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('assetClient/img/product02.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="cart-summary px-3">
                                    <small>3 Item(s) selected</small>
                                    <h6 class="mb-3">SUBTOTAL: $2940.00</h6>
                                </div>
                                <div class=" row">
                                    <div class="col-6 pe-0">
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-dark btn-block rounded-0">View Cart</a>
                                          </div>
                                        
                                    </div>
                                    <div class="col-6 ps-0">
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-danger btn-block rounded-0">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                          </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                      </div>
                    </li>
                  </ul>
            </div>
            
            
          </div>
        </div>
      </nav>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="my-navigation" class="py-3">
    <!-- container -->
    <div class="container">
            <ul class="nav nav-underline justify-content-around justify-content-lg-start">
                <li class="nav-item"><a href="{{route('electro.index')}}" class="text-danger nav-link active">Home</a></li>
                @foreach ($last5Categories as $category)
                    <li class="nav-item mx-3"><a href="{{route('electro.stores',['category'=>$category->id])}}" class="text-dark nav-link text-capitalize">{{$category->nom}}</a></li>
                @endforeach
            </ul>
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

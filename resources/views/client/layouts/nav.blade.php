<?php
    use App\Models\Categorie;
    $last5Categories = Categorie::take(5)->get();
?>

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
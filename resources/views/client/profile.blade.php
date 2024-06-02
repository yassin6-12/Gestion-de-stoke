

@extends('client.layouts.master')
@section('main')
    @if (true)
    your welcome
    @else
    
    <div class="login-box">
        <form class="form mt-5" action="{{ route('Seconnect') }}" method="POST">
            @csrf
            <div class="login-form">
            <a href="index.html" class="login-logo">
                <img src="assets/images/logo.svg" alt="Vico Admin" />
            </a>
            <div class="login-welcome">
                Bienvenue à nouveau, <br />veuillez vous connecter à votre compte administrateur Moonlight.
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="text-dark">Password:</label><br>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }} </span>
                @enderror
            </div>
            <div class="login-form-actions">
                <a href="forgot-password" class="btn-link ml-auto">Mot de passe oublié ?</a>
                <button type="submit" name="submit" class="btn"> <span class="icon"> <i class="bi bi-arrow-right-circle"></i> </span>
                    Connectez-vous</button>
            </div>
            </div>
        </form>

    </div>
    @endif
	
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
	$('.products-tabs .products-slick-nav').each(function(inex,ele){
		if(index == 2 || index == 3){
			var childs = $(this).children();
			childs[0].remove();
			childs[3].remove(); 
		}
	})

</script>
@endsection
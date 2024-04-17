<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Moonlight - Responsive Bootstrap 5 Dashboard Template">
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="assets/images/favicon.svg">

		<!-- Title -->
		<title>Modern Admin Dashboards</title>


		<!-- *************
			************ Common Css Files *************
		************ -->

		<!-- Animated css -->
		<link rel="stylesheet" href="assets/css/animate.css">

		<!-- Bootstrap font icons css -->
		<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css">

		<!-- Main css -->
		<link rel="stylesheet" href="assets/css/main.min.css">


	</head>

	<body class="login-container">

		 {{-- Loading wrapper start  --}}
		<!-- <div id="loading-wrapper">
			<div class="spinner">
                <div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
            </div>
		</div> -->
		<!-- Loading wrapper end -->

		<!-- Login box start -->
        <form class="form mt-5" action="{{ route('Seconnect') }}" method="POST">
            @csrf
			<div class="login-box">
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
					</div>
					<div class="mb-3">
						<div class="d-flex justify-content-between">
							<label class="form-label">Mot de passe</label>
						</div>
						<input type="password" name="password" class="form-control">
					</div>

					<div class="login-form-actions">
						<a href="forgot-password.html" class="btn-link ml-auto">Mot de passe oublié ?</a>
						<a href="/"><button type="submit" class="btn"> <span class="icon"> <i class="bi bi-arrow-right-circle"></i> </span>
							Connectez-vous</button></a>
						
					</div>

				</div>
			</div>
		</form>
		<!-- Login box end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/modernizr.js"></script>
		<script src="assets/js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
		<script src="assets/js/main.js"></script>

	</body>

</html>

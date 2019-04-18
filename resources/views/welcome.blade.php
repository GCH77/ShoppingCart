<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Laravel</title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	
	<!-- Styles -->
	<style>
		html, body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 200;
			height: 100vh;
			margin: 0;
		}
		
		.full-height {
			height: 100vh;
		}
		
		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}
		
		.position-ref {
			position: relative;
		}
		
		.top-right {
			position: absolute;
			right: 10px;
			top: 18px;
		}
		
		.content {
			text-align: center;
		}
		
		.title {
			font-size: 84px;
		}
		
		.links > a {
			color: #636b6f;
			padding: 0 25px;
			font-size: 13px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-decoration: none;
			text-transform: uppercase;
		}
		
		.m-b-md {
			margin-bottom: 30px;
		}
		
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}
		
		/* .carousel {
			margin-bottom: 4rem;
		}
		.carousel-item {
			height: 32rem;
		}
		.carousel img {
			max-height: 300px;
			position: relative;
			margin: 0 auto;
			top: 0;
			left: 0;
			min-width: 100%;
			height: 32rem;
		} */
		
	</style>
	
</head>
<body>
	<div class="flex-center position-ref full-height">
		@if (Route::has('login'))
		<div class="top-right links">
			@auth
			<a href="{{ url('/home') }}">Home</a>
			@else
			<a href="{{ route('login') }}">Login</a>
			
			@if (Route::has('register'))
			<a href="{{ route('register') }}">Register</a>
			@endif
			@endauth
		</div>
		@endif
		
		<div class="content">
			{{-- <div class="title m-b-md">
				Laravel
			</div>
			
			<div class="links">
				<a href="https://laravel.com/docs">Docs</a>
				<a href="https://laracasts.com">Laracasts</a>
				<a href="https://laravel-news.com">News</a>
				<a href="https://blog.laravel.com">Blog</a>
				<a href="https://nova.laravel.com">Nova</a>
				<a href="https://forge.laravel.com">Forge</a>
				<a href="https://github.com/laravel/laravel">GitHub</a>
			</div> --}}
			
			
			<div class="container mt-3">
				
				{{-- Carousel --}}
				<div id="carouselPrincipal" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselPrincipal" data-slide-to="0" class=""></li>
						<li data-target="#carouselPrincipal" data-slide-to="1" class="active"></li>
						<li data-target="#carouselPrincipal" data-slide-to="2" class=""></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item">
							<img class="first-slide" src="{{ asset('storage/carousel/la.jpg') }}" alt="First slide">
							<div class="container">
								<div class="carousel-caption text-left">
									<h1>Example headline.</h1>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
								</div>
							</div>
						</div>
						<div class="carousel-item active">
							<img class="second-slide" src="{{ asset('storage/carousel/chicago.jpg') }}" alt="Second slide">
							<div class="container">
								<div class="carousel-caption">
									<h1>Another example headline.</h1>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img class="third-slide" src="{{ asset('storage/carousel/ny.jpg') }}" alt="Third slide">
							<div class="container">
								<div class="carousel-caption text-right">
									<h1>One more for good measure.</h1>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselPrincipal" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselPrincipal" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
			</div>
			
			<div class="container">
				
			</div>
		</div>
	</div>
</body>
</html>

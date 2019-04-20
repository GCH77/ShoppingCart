<template>
    
<div>
		<!-- Carousel -->
    <div class="container mt-3">
			<div id="carouselPrincipal" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselPrincipal" data-slide-to="0" class=""></li>
					<li data-target="#carouselPrincipal" data-slide-to="1" class="active"></li>
					<li data-target="#carouselPrincipal" data-slide-to="2" class=""></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item">
						<img class="first-slide" src="{{ asset('storage/carousel/ipsa.jpg') }}" alt="First slide">
						<div class="container">
							<div class="carousel-caption text-left">
								<h1>Example headline.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
							</div>
						</div>
					</div>
					<div class="carousel-item active">
						<img class="second-slide" src="{{ asset('storage/carousel/underpred.jpg') }}" alt="Second slide">
						<div class="container">
							<div class="carousel-caption">
								<h1>Another example headline.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="third-slide" src="{{ asset('storage/carousel/air-jordan.jpg') }}" alt="Third slide">
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
</div>


</template>
<script>
export default {
    data() {
        return{
            productos: []
        }
    },
    methods: {
        getAllProductos() {
            axios.get(productos).then((response) => {
            console.log(response);
            // for (const productos of response.data) {
            //    this.items.push(productos);
            // }
         });
        }
    }
}
</script>

<style scoped>
	/* Make the image fully responsive */
	.carousel-inner img {
		width: 100%;
		height: 100%;
	}
	.carousel {
		margin-bottom: 4rem;
	}
	.carousel-item .carousel-inner {
		height: 50rem;
	}
	.carousel img {
		max-height: 400px;
		position: relative;
		margin: 0 auto;
		top: 0;
		left: 0;
		min-width: 100%;
		height: 50rem;
	}
</style>
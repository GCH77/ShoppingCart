<template>
  <div>
    <!-- Carousel -->
    <div class="container mt-3">
      <div id="carouselPrincipal" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselPrincipal" data-slide-to="0" class="active"></li>
          <li data-target="#carouselPrincipal" data-slide-to="1" class></li>
          <li data-target="#carouselPrincipal" data-slide-to="2" class></li>
          <li data-target="#carouselPrincipal" data-slide-to="3" class></li>
          <li data-target="#carouselPrincipal" data-slide-to="4" class></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              class="first-slide"
              src="../../../../storage/app/public/carousel/yeezy.png"
              alt="First slide"
            >
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-primary">YEEZY COLLECTION</h1>
                <p>
                  Adidas Yeezy 350 v2
                  <br>"Hyperspace"
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Conoce más</a>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="second-slide"
              src="../../../../storage/app/public/carousel/73.png"
              alt="Second slide"
            >
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-primary">Nite Jogger</h1>
                <p>
                  La comodidad inigualable de la tecnología BOOST.
                  <br>Detalles reflectantes que te hacen más visible de noche.
                  <br>Los Nite Jogger están de vuelta en nuevos colores.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Conoce más</a>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="third-slide"
              src="../../../../storage/app/public/carousel/nike.png"
              alt="Third slide"
            >
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-primary">AIR MAX SELECTS</h1>
                <p>
                  Nike Air Max 90.
                  <br>"Mars Landing"
                  <br>
                  <b class="text-warning">30% OFF</b>
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Conoce más</a>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="fourth-slide"
              src="../../../../storage/app/public/carousel/leather.png"
              alt="Fourth slide"
            >
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-primary">SOLE FURY</h1>
                <p>
                  Con tecnología de Split-Cushioning.
                  <br>Cushioning with a kick.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Conoce más</a>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="fifth-slide"
              src="../../../../storage/app/public/carousel/puma.png"
              alt="Fifth slide"
            >
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="text-primary">HYBRID</h1>
                <p>
                  The power of Hybrid Runner Dessert.
                  <br>Comodidad soporte y energía.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Conoce más</a>
                </p>
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
      <div class="row">
        <!-- <template v-for="item in productos">
          <product-list-component :key="item.id" :item="item"></product-list-component>
        </template> -->
        <div class="col-md-12">
          <h2>Trending <b>Products</b></h2>
          <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
          <!-- Carousel indicators -->
            <!-- <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>    -->
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
              <div class="item carousel-item active">
                <div class="row">
                  <template v-for="item in productos">
                    <product-list-component :key="item.id" :item="item"></product-list-component>
                  </template>
                </div>
              </div>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "view-welcome",
  props: ["auth"],
  data() {
    return {
      productos: ""
    };
  },
  created() {
      console.log("Desde ViewWelcome - auth");
		console.log(this.$attrs);
		this.getAllProductos();
  },
  methods: {
    getAllProductos() {
      axios.get("list").then(response => {
        this.productos = response.data;
        console.log(response.data);
        // for (const productos of response.data) {
        //    this.items.push(productos);
        // }
      });
    }
  }
};
</script>

<style scoped>
/* Make the image fully responsive */
#carouselPrincipal {
  margin-bottom: 3rem;
  background-color: rgba(148, 155, 155, 0.664);
}
.carousel-inner > .carousel-item > img {
  padding-left: 5rem;
  height: 100%;
  width: initial;
  max-height: 400px;
  /* min-width: 100%; */
  height: 70rem;
}
.carousel-item {
  background-size: contain;
  /* text-align:center; */
}
/* .carousel-inner img {
		width: 100%; 
		height: auto;
	}
	
	.carousel-item .carousel-inner {
		height: 70rem;
		background-size: cover;
	}
	.carousel img {
		max-height: 400px;
		position: relative;
		margin: 0 auto;
		top: 0;
		left: 0;
		min-width: 100%;
		height: 70rem;
  } */
  h2 {
	color: #000;
	font-size: 26px;
	font-weight: 300;
	text-align: center;
	text-transform: uppercase;
	position: relative;
	margin: 30px 0 80px;
}
h2 b {
	color: #ffc000;
}
h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	background: rgba(0, 0, 0, 0.2);
	left: 0;
	right: 0;
	bottom: -20px;
}
.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .carousel-control {
	height: 100px;
    width: 40px;
    background: none;
    margin: auto 0;
    background: rgba(0, 0, 0, 0.2);
}
.carousel .carousel-control i {
    font-size: 30px;
    position: absolute;
    top: 50%;
    display: inline-block;
    margin: -16px 0 0 0;
    z-index: 5;
    left: 0;
    right: 0;
    color: rgba(0, 0, 0, 0.8);
    text-shadow: none;
    font-weight: bold;
}
.carousel .carousel-control.left i {
	margin-left: -3px;
}
.carousel .carousel-control.left i {
	margin-right: -3px;
}
/* .carousel .carousel-indicators {
	bottom: -50px;
} */
/* .carousel-indicators li, .carousel-indicators li.active {
	width: 10px;
	height: 10px;
	margin: 4px;
	border-radius: 50%;
	border-color: transparent;
} */
/* .carousel-indicators li {	
	background: rgba(0, 0, 0, 0.2);
}
.carousel-indicators li.active {	
	background: rgba(0, 0, 0, 0.6);
} */
.star-rating li {
	padding: 0;
}
.star-rating i {
	font-size: 14px;
	color: #ffc000;
}
</style>
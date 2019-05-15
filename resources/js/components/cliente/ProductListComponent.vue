<template>
    <!-- <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
        <div class="card mb-4 box-shadow" style="min-height: 100%;">
            <img class="card-img-top" :src="urlImg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"> <p class="lead font-weight-bold">{{item.nombre}}</p></h5>
                <p class="card-text"> {{ item.descripcion }}</p>
                <p class="item-price"><span>${{item.almacenes[0].precio_venta}}</span></p>
                <small class="text-muted">${{item.almacenes[0].precio_venta}}</small>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-info" @click="redireccionar(item)">Ver detalles</button>
                    </div>
                    <small class="text-muted">${{item.almacenes[0].precio_venta}}</small>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-sm-6 col-md-4 col-lg-3 mt-4" style="margin-bottom: 5px;">
        <div class="card">
            <img class="card-img-top" :src="urlImg">
            <div class="card-block">
                <figure class="profile">
                    <img :src="urlImg" class="profile-avatar" alt="">
                </figure>
                <h4 class="card-title mt-3">{{item.nombre}}</h4>
                <div class="meta">
                    <a>{{item.marca.marca}}</a>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-info" @click="redireccionar(item)">Ver detalles</button>
                    </div>
                    <small class="item-price"><span>${{item.almacenes[0].precio_venta}}</span></small>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
   name: "product-list-component",
   props:['item'],
   data(){
       return{
           
       }
   },
   created() {
       
   },
   computed: {
       urlImg(){
           let words = this.item.imagenes[0].ruta.split("\\");
           return "../../../../"+words[4]+"/"+words[7]+"/"+words[8];
       }
   },
   methods: {
       redireccionar(data){
           console.log(data);
            this.$router.push({name: "detallesproductos", params: { item: data } });
       }
   }
}
</script>
<style lang="scss" scoped>
.item-price {
	font-size: 10px;
	// padding: 2px 0;
}
.item-price span {
	color: #86bd57;
	font-size: 125%;
}
.card {
    min-height: 100%;
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    display: block;
    width: 100%;
    height: auto;
}

.card-title {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05) !important;
    background: #fff;
}

.profile {
    position: absolute;
    top: -12px;
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    width: 25px;
    height: 25px;
    margin: 0;
    border: 1px solid #fff;
    border-radius: 50%;
}

.profile-avatar {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 50%;
}

.profile-inline {
    position: relative;
    top: 0;
    display: inline-block;
}

.profile-inline ~ .card-title {
    display: inline-block;
    margin-left: 4px;
    vertical-align: top;
}

.text-bold {
    font-weight: 700;
}

.meta {
    font-size: 1em;
    color: rgba(0, 0, 0, .4);
}

.meta a {
    text-decoration: none;
    color: rgba(0, 0, 0, .4);
}

.meta a:hover {
    color: rgba(0, 0, 0, .87);
}
</style>


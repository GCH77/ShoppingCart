<template>

<div class="main">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-4" id="imagenproducto">
                <img :src="urlImg" class="img-fluid" alt="">   
            </div>
            
            <div class="col-md-6 mb-4">
                <a href class="ml-2">
                    <template v-for="(middle, index) in item.lineas_producto">
                    <span class="badge badge-primary mr-1" :key="index">{{middle.lineas.linea}}</span>
                    </template>
                </a>
                <div class="p-2">    
                    <p class="lead font-weight-bold">{{item.nombre}}</p>
                    <p>{{item.descripcion}}</p>
                    
                    <p class="lead">
                        <span class="mr-1">${{item.almacenes[0].precio_venta}}</span>
                    </p>
                    <div class="d-flex justify-content-start align-items-baseline">
                        <label for="colores" class="mr-1">Colores:</label>
                        <template v-for="(middle, index) in item.colores_producto">
                            <div class="picker-color  ml-1" name="colores" :key="index" :style="{backgroundColor: middle.color.hexa}"></div>
                        </template>
                    </div>
                    <form class="d-flex justify-content-start align-items-baseline">
                        <label for="cantidad">Cantidad:</label>
                        <button type="button" class="btn btn-outline-info ml-2" @click="subQuantity"><i class="fas fa-minus"></i></button>
                        <strong style="width: 35px; text-align:center">{{ quantity }}</strong>
                        <button type="button" class="btn btn-outline-info mr-2" @click="addQuantity"><i class="fas fa-plus"></i></button>
                        <label for="tallas">Talla:</label>
                        <select name="tallas" id="tallas" class="form-control ml-1 mr-2" style="width: 80px">
                            <template v-for="(middle, index) in item.tallas_producto">
                            <option :key="index" :value="middle.id">{{middle.tallas.talla}}</option>
                            </template>
                        </select>
                        <button class="btn btn-primary btn-md my-0 p ml-1" type="submit" @click.prevent="checkout(item.id)">Comprar
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>
                    </form>
                    
                </div>                  
            </div>             
        </div>
        lightbox?
        <div class="row mt-2 mb-2">
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/04LDEYRW59.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/90V03Q5Y60.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/O83SF2RB6D.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/5JVPSVP7EI.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/C5Y10KIIHA.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/YSSFRY5B25.jpg" alt="">
            </div>
        </div>
        <hr>
    </div>
</div>

</template>
<script>
    export default {
        name: "product-details-component",
        props:['item'],
        data(){
            return{
                quantity: 0
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
            addQuantity() {
                this.quantity++;
            },
            subQuantity() {
                if (this.quantity > 0) {
                    this.quantity--;
                }
            },
            checkout(data) {
                this.$router.push({name: "checkout", params: { idItem: data } });
            }
        }
    }
</script> 
<style scoped>
    .row>.col-2 img {
        padding: 0;
        max-width: auto;
    }
    
    #imagenproducto {
        max-height: 650px;
        max-width: 500px;
    }
    
</style>
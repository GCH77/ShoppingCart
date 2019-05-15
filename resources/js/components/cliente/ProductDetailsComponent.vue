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
                    <span class="badge badge-primary mr-1">{{item.marca.marca}}</span>
                </a>
                <div class="p-2">    
                    <p class="lead font-weight-bold">{{item.nombre}}</p>
                    <p>{{item.descripcion}}</p>
                    
                    <p class="lead">
                        <span class="mr-1">${{item.almacenes[0].precio_venta}}</span>
                    </p>
                    <div class="d-flex justify-content-start align-items-baseline">
                        <label for="colores" class="mr-3">Colores:</label>
                        <template v-for="(middle, index) in item.colores_producto">
                            <div class="colors  ml-1" name="colores" :key="index" :style="{backgroundColor: middle.color.hexa}"></div>
                        </template>
                    </div>
                    <form class="d-flex justify-content-start align-items-baseline">
                        <label for="cantidad">Cantidad:</label>
                        <button type="button" class="btn btn-outline-info ml-2" @click="subQuantity"><i class="fas fa-minus"></i></button>
                        <strong style="width: 35px; text-align:center; border: 1px solid transparent;" class="form-control">{{ quantity }}</strong>
                        <button v-if="quantity < item.almacenes[0].cantidad" type="button" class="btn btn-outline-info mr-2" @click="addQuantity"><i class="fas fa-plus"></i></button>
                        <button v-else="" disabled  type="button" class="btn btn-outline-info mr-2" @click="addQuantity"><i class="fas fa-plus"></i></button>
                        <label for="tallas">Talla:</label>
                        <select name="tallas" id="tallas" class="form-control ml-1 mr-2" style="width: 80px">
                            <template v-for="(middle, index) in item.tallas_producto">
                            <option :key="index" :value="middle.id">{{middle.tallas.talla}}</option>
                            </template>
                        </select>
                        <button v-if="this.attrs.id" :disabled="quantity<=0" class="btn btn-primary btn-md my-0 p ml-1" type="submit" @click.prevent="checkout(item)">Comprar
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>
                        <a v-else class="btn btn-primary" href="http://localhost:8000/register#/" role="button">
                            Comprar
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </a>
                        <!-- <a href="" class="button">Go to Google</a> -->
                    </form>
                    
                </div>                  
            </div>             
        </div>
        <!-- lightbox? -->
        <div class="row mt-2 mb-2">
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://http2.mlstatic.com/tenis-hombre-heathrow-adys700071-nkh-dc-shoes-azul-D_NQ_NP_873727-MLM28296019220_102018-F.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://images-sportsdirect.wearepentagon.com/1/38104_11303402.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://assets.adidas.com/images/h_600,f_auto,q_auto:sensitive,fl_lossy/c86980d8aa7a4eba889aa8260166b62a_9366/Barricade_Club_Skor_Svart_CM7781_01_standard.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="http://www.int4life-europa.es/images/category_24/Tenis%20Casual%20Hombre%20Tommy%20Shoes%20ZLGP%20Beige%2090%20Cuero10%20Textil%20Tenis.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://www.coppel.com/images/catalog/pr/8062072-1.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://dsw.scene7.com/is/image/DSWShoes/420257_008_ss_01?$pdp-image$" alt="">
            </div>
        </div>
        <hr>
    </div>
</div>

</template>
<script>
    export default {
        name: "product-details-component",
        props:['item', 'attrs'],
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
                this.$router.push({name: "checkout", params: { item: data } });
                data.quantity = this.quantity;
                console.log(data);
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
    div.colors{
        margin-top:3px;
        width:15px; 
        height:15px;    
        margin-right:5px;
        float:left;
        border-radius: 30%;
    }
    
</style>
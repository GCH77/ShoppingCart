<template>
<div class="main">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-4" id="imagenproducto">
                <img :src="urlImg" class="img-fluid" alt="" style="border-radius: 3%;">   
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
                    
                    <p>
                        Precio: <span class="item-price ml-3">${{item.almacenes[0].precio_venta}}</span>
                    </p>
                    <div class="d-flex justify-content-start align-items-baseline">
                        <label for="colores" class="mr-3">Colores:</label>
                        <template v-for="(middle, index) in item.colores_producto">
                            <div class="custom-control custom-radio" :key="'check'+index">
                                <input type="radio" class="custom-control-input" :id="'customControlValidation'+index" name="radio-stacked" :value="middle.color.hexa" v-model="choosedProduct.color">
                                <label class="custom-control-label" :for="'customControlValidation'+index"></label>
                            </div>
                            <div class="colors mr-4" name="colores" :key="'color'+index" :style="{backgroundColor: middle.color.hexa}"></div>
                        </template>
                    </div>
                    <form class="d-flex justify-content-start align-items-baseline">
                        <label for="cantidad">Cantidad:</label>
                        <button type="button" class="btn btn-outline-info ml-2" @click="subQuantity"><i class="fas fa-minus"></i></button>
                        
                        <strong style="width: 35px; text-align:center; border: 1px solid transparent;" class="form-control">{{ quantity }}</strong>
                        
                        <button v-if="quantity < item.almacenes[0].cantidad" type="button" class="btn btn-outline-info mr-2" @click="addQuantity"><i class="fas fa-plus"></i></button>
                        <button v-else="" disabled  type="button" class="btn btn-outline-info mr-2" @click="addQuantity"><i class="fas fa-plus"></i></button>
                        
                        <label for="tallas">Talla:</label>
                        <select name="tallas" id="tallas" class="form-control ml-1 mr-2" style="width: 80px" v-model="choosedProduct.talla">
                            <template v-for="(middle, index) in item.tallas_producto">
                            <option :key="index" :value="middle.tallas.talla">{{middle.tallas.talla}}</option>
                            </template>
                        </select>
                        <button v-if="this.attrs.id" :disabled="quantity<=0" class="btn btn-primary btn-md my-0 p ml-1" type="submit" @click.prevent="checkout(item)">Añadir
                            <i class="fas fa-cart-plus"></i>
                        </button>
                        <a v-else class="btn btn-primary" href="http://localhost:8000/register#/" role="button">
                            Añadir
                            <i class="fas fa-cart-plus"></i>
                        </a>
                        <!-- <a href="" class="button">Go to Google</a> -->
                    </form>
                    <div class="alert alert-warning alert-dismissible fade mt-4" id="warningAlert" role="alert">
                        <strong>Suggestion.</strong> You should choose one color and size of the product
                        <button type="button" class="close" @click="dismissAlert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
import { mapActions, mapState } from 'vuex';
export default {
    name: "product-details-component",
    props:['item', 'attrs'],
    data(){
        return{
            choosedProduct: {
                id: '',
                nombre: '',
                marca: '',
                cod_barras: '',
                img: '',
                quantity: 0,
                color: '',
                talla: '',
                precioUnitario: ''
            },
            quantity: 0
        }
    },
    created() {
        
    },
    computed: {
        ...mapState(['shopCar']),
        urlImg(){
            let words = this.item.imagenes[0].ruta.split("\\");
            return "../../../../"+words[4]+"/"+words[7]+"/"+words[8];
        }
    },
    methods: {
        ...mapActions(['setshopCar']),
        addQuantity() {
            this.quantity++;
        },
        subQuantity() {
            if (this.quantity > 0) {
                this.quantity--;
            }
        },
        checkout(data) {
            if (this.validate()) {
                this.choosedProduct.id = data.id;
                this.choosedProduct.nombre = data.nombre;
                this.choosedProduct.marca = data.marca.marca;
                this.choosedProduct.cod_barras = data.cod_barras;
                this.choosedProduct.img = this.urlImg;
                this.choosedProduct.quantity = this.quantity;
                this.choosedProduct.precioUnitario = data.almacenes[0].precio_venta
                this.setshopCar(this.choosedProduct);
                // this.$router.push({name: "checkout"});
                toastr.success("Producto añadido al carrito de compras", "ShoppingCart");
            }
        },
        validate(){
            if (
                this.choosedProduct.color === '' ||
                this.choosedProduct.talla === ''
            ) {
                console.log("Entre show please");
                $('.alert').addClass('show');
                return false;
            }else {
                return true;
            }
        },
        dismissAlert(){
            $('.alert').removeClass('show');
        }
    }
}
</script> 
<style scoped>
    .item-price {
        font-size: 10px;
    }
    .item-price{
        color: #86bd57;
        font-size: 125%;
    }
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
<template>
    <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" :src="`../../../../${item.imagenes[0].ruta}`" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> <p class="lead font-weight-bold">{{item.nombre}}</p></h5>
                    <p class="card-text"> {{ item.descripcion }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-info" @click="redireccionar(item)">Ver detalles</button>
                        </div>
                        <small class="text-muted">${{item.almacenes[0].precio_venta}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
   name: "product-list-component",
   props:['item', 'filter'],
   data(){
       return{
           
       }
   },
   created() {
       
   },
   methods: {
       redireccionar(data){
           console.log(data);
            this.$router.push({name: "detallesproductos", params: { item: data } });
       }
   }
}
</script>


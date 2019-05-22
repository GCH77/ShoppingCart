<template>
   <div>
      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelNombre">Nombre del producto</label>
               <input v-model="newProduct.nombre" type="text" class="form-control" id="modelNombre" placeholder="Nombre">
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelNombre">Codigo de barras</label>
               <input v-model="newProduct.cod_barras" type="text" class="form-control" id="modelNombre" placeholder="Cod. barras">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNombre">Cantidad</label>
               <input v-model="newProduct.cantidad" type="text" class="form-control" id="modelNombre" placeholder="Cantidad">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNombre">Precio compra</label>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Precio de compra (COP)" v-model="newProduct.precio_compra">
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNombre">Precio venta</label>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Precio de venta (COP)" v-model="newProduct.precio_venta">
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="form-group">
               <label for="modelPrecio">Descripcion del producto</label>
               <input v-model="newProduct.descripcion" type="text" class="form-control" id="modelPrecio" placeholder="Descripcion">
            </div>
         </div>
      </div>
      <div class="form-group" v-if="!newProduct.id">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newProduct)">Crear</button>
      </div>
      <div class="form-group" v-else>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.editData(newProduct)">Editar</button>
      </div>
   </div>
</template>
<script>
export default {
   name: "form-new-product",
   props: {
      model: {
         type: Object,
         required: true
      }
   },
   data(){
      return{
         newProduct: this.model
      }
   },
   watch: {
      model(data){
         this.newProduct = data;
      }
   },
   methods: {

   }
}
</script>

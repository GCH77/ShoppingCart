<template>
   <div>
      <div class="form-group">
         <label for="modelId">Nombre del producto</label>
         <input v-model="newProduct.id" type="text" class="form-control" id="modelId" placeholder="Id">
      </div>
      <div class="form-group">
         <label for="modelNombre">Nombre del producto</label>
         <input v-model="newProduct.nombre" type="text" class="form-control" id="modelNombre" placeholder="Nombre">
      </div>
      <div class="form-group">
         <label for="modelPrecio">Nombre del producto</label>
         <input v-model="newProduct.precio" type="text" class="form-control" id="modelPrecio" placeholder="Precio">
      </div>
      <div class="form-group">
          <button type="button" class="btn btn-success" @click="$parent.saveData(newProduct)">Enviar</button>
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
   methods: {

   }
}
</script>

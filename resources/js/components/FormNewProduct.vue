<template>
   <div>
      <div class="form-group">
         <label for="modelNombre">Nombre del producto</label>
         <input v-model="newProduct.nombre" type="text" class="form-control" id="modelNombre" placeholder="Nombre">
      </div>
      <div class="form-group">
         <label for="modelPrecio">Descripcion del producto</label>
         <input v-model="newProduct.descripcion" type="text" class="form-control" id="modelPrecio" placeholder="Precio">
      </div>
      <div class="form-group" v-if="!newProduct.id">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newProduct)">Crear</button>
      </div>
      <div class="form-group" v-if="newProduct.id">
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
         console.log("Cambio la info..");
         console.log(data);
         this.newProduct = data;
      }
   },
   methods: {

   }
}
</script>

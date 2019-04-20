<template>
   <div>
      <div class="form-group">
         <label for="modelRol">Nombre del rol</label>
         <input v-model="newRol.rol" type="text" class="form-control" id="modelRol" placeholder="Rol">
      </div>
      <div class="form-group">
         <label for="modelDescripcion">Descripcion del rol</label>
         <input v-model="newRol.descripcion" type="text" class="form-control" id="modelDescripcion" placeholder="Descripcion">
      </div>
      <div class="form-group" v-if="!newRol.id">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newRol)">Crear</button>
      </div>
      <div class="form-group" v-else>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.editData(newRol)">Editar</button>
      </div>
   </div>
</template>
<script>
export default {
   name: "form-new-rol",
   props: {
      model: {
         type: Object,
         required: true
      }
   },
   data(){
      return{
         newRol: this.model
      }
   },
   watch: {
      model(data){
         this.newRol = data;
      }
   },
   methods: {

   }
}
</script>
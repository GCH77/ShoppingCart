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
      
      <!-- <div class="col-md-12"> -->
         <div class="form-group">
            <label for="modelRol">Permisos o Acceso</label>
            <div class="alert alert-info" role="alert">
               Nota. A continuacion usted debe seleccionar unicamente las facultades de cada Modulos
               al que desee que el nuevo Rol quiere que tenga acceso o permiso.
            </div>
            <table class="table table-sm table-hover table-bordered">
               <thead>
                  <tr>
                     <th scope="col" align="center">#</th>
                     <th scope="col" align="center">Modulos Sistema</th>
                     <th id="center" scope="col">Crear</th>
                     <th id="center" scope="col">Leer</th>
                     <th id="center" scope="col">Actualizar</th>
                     <th id="center" scope="col">Borrar</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">1</th>
                     <td>Gestion de Productos</td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">2</th>
                     <td>Gestion de Proveedores</td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">3</th>
                     <td>Gestion de Usuarios</td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">4</th>
                     <td>Gestion de Roles</td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                     <td id="center">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      <!-- </div> -->
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
<style lang="scss" scoped>
   .table #center {
      text-align: center;   
   }
</style>

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
            <span>{{ newRol.permisos_roles_mod_func }}</span>
            <div class="alert alert-info" role="alert">
               Nota. A continuacion usted debe seleccionar unicamente las facultades de cada Modulos
               al que desee que el nuevo Rol quiere que tenga acceso o permiso.
            </div>
            <table class="table table-sm table-hover table-bordered">
               <thead>
                  <tr>
                     <th scope="col" align="center">#</th>
                     <th scope="col" align="center">Modulos Sistema</th>
                     <template v-for="funcion in funciones">
                        <th :key="funcion.id" id="center" scope="col">{{ funcion.funcionalidad }}</th>
                     </template>
                  </tr>
               </thead>
               <tbody>
                  <template v-for="modulo in modulos">
                     <tr :key="modulo.id">
                        <th scope="row">{{ modulo.id }}</th>
                        <td>Gestion de {{ modulo.modulo }}</td>
                        <template v-for="funcion in funciones">
                           <td id="center" :key="funcion.id">
                              <div class="custom-control custom-checkbox">
                                 <input 
                                    type="checkbox" 
                                    class="custom-control-input" 
                                    :id="modulo.modulo+funcion.id"
                                    :value="modulo.id+','+funcion.id"
                                    v-model="newRol.permisos_roles_mod_func"
                                 >
                                 <label class="custom-control-label" :for="modulo.modulo+funcion.id"></label>
                              </div>
                           </td>
                        </template>
                     </tr>
                  </template>
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
         newRol: '',
         modulos: '',
         funciones: ''
      }
   },
   created(){
      this.getModulos();
      this.getFunciones();
   },
   watch: {
      model(data){
         let checkbox = [];
         console.log("FormNewRol - watch - Data");
         // data.rol === '' ? console.log("Vacio") : console.log("Lleno");
         if (data.rol != '') {
            console.log(data.permisos_roles_mod_func);
            data.permisos_roles_mod_func.forEach(element => {
               // console.log(element.id_modulos+","+element.id_funcionalidades);
               checkbox.push(element.id_modulos+","+element.id_funcionalidades);
            });
            data.permisos_roles_mod_func = checkbox;
            this.newRol = data;
         }else {
            this.newRol = data;
         }
      }
   },
   methods: {
      getModulos(){
         axios.get('modulos').then((response) => {
            this.modulos = response.data;
         })
      },
      getFunciones(){
         axios.get('funciones').then((response) => {
            this.funciones = response.data;
         })
      }
   }
}
</script>
<style lang="scss" scoped>
   .table #center {
      text-align: center;   
   }
</style>

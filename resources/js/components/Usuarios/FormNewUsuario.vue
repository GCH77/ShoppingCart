<template>
   <div>
      <div class="form-row">
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNombres">Nombres</label>
               <input v-model="newUsuario.nombre" type="text" class="form-control" id="modelNombres" placeholder="Nombres">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelApellidos">Apellidos</label>
               <input v-model="newUsuario.apellidos" type="text" class="form-control" id="modelApellidos" placeholder="Apellidos">
            </div>
         </div>
         <div class="col-md-4" v-if="newUsuario.user || newUsuario.nameuser == ''">
            <div class="form-group">
               <label for="modelUsername">Username</label>
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                  </div>
                  <input v-if="newUsuario.id" v-model="newUsuario.user.username" type="text" class="form-control" id="modelUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                  <input v-else v-model="newUsuario.nameuser" type="text" class="form-control" id="modelUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
               </div>
            </div>
         </div>
         <div class="col-md-5">
            <div class="form-group">
               <label for="modelCorreo">Correo electronico</label>
               <input v-model="newUsuario.correo" type="email" class="form-control" id="modelCorreo" placeholder="Correo electronico">
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <label for="modelTipoDoc">Tipo Documento</label>
               <select v-model="newUsuario.id_tipos_documento" id="modelTipoDoc" class="form-control">
                  <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.tipo}}-{{tipo.descripcion}}</option>
               </select>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNumDoc">Numero documento</label>
               <input v-model="newUsuario.num_documento" type="text" class="form-control" id="modelNumDoc" placeholder="Numero de documento">
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelDireccion">Direccion</label>
               <input v-model="newUsuario.direccion" type="text" class="form-control" id="modelDireccion" placeholder="Direccion">
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelTelefono">Telefono</label>
               <input v-model="newUsuario.telefono" type="text" class="form-control" id="modelTelefono" placeholder="Telefono">
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <label for="modelRol">Rol</label>
               <select v-model="newUsuario.id_rol" id="modelRol" class="form-control" :disabled="newUsuario.id_rol === 5">
                  <option v-for="rol in roles" :key="rol.id" :value="rol.id">{{rol.rol}}</option>
               </select>
            </div>
         </div>
         <!-- <div class="col-md-12">
            <div class="form-group">
               <label for="modelRol">Roles asignados</label>
               <table class="table table-sm table-hover table-bordered">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                     </tr>
                     <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                     </tr>
                  </tbody>
               </table>
               <select v-model="newUsuario.rol" id="modelRol" class="form-control">
                  <option v-for="rol in roles" :key="rol.id" :value="rol.id">{{rol.rol}}</option>
               </select>
            </div>
         </div> -->
      </div>
      <div class="form-group" v-if="!newUsuario.id">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newUsuario)">Crear</button>
      </div>
      <div class="form-group" v-else>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.editData(newUsuario)">Editar</button>
      </div>
   </div>
</template>
<script>
export default {
   name: "form-new-usuario",
   props: {
      model: {
         type: Object,
         required: true
      }
   },
   data(){
      return{
         newUsuario: this.model,
         tipos: '',
         roles: ''
      }
   },
   watch: {
      model(data){
         this.newUsuario = data;
      }
   },
   created(){
      this.getTipoDocumentos();
      this.getRoles();
   },
   methods: {
      getTipoDocumentos(){
         axios.get('/tiposDocumentos').then((response) => {
            this.tipos = response.data;
         });
      },
      getRoles(){
         axios.get('roles').then((response) => {
            this.roles = response.data;
         });
      }
   }
}
</script>
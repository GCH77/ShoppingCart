<template>
   <div>
      <div class="form-row">
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNit">Nit</label>
               <input v-model="newProveedor.nit" type="text" class="form-control" id="modelNit" placeholder="Nit">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelRazonSocial">Razón Social</label>
               <input v-model="newProveedor.razon_social" type="text" class="form-control" id="modelRazonSocial" placeholder="Razón Social">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelDireccione">Dirección Empresa</label>
               <input v-model="newProveedor.direccione" type="text" class="form-control" id="modelDireccione" placeholder="Dirección Empresa">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNombres">Nombres</label>
               <input v-model="newProveedor.persona.nombre" type="text" class="form-control" id="modelNombres" placeholder="Nombres">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelApellidos">Apellidos</label>
               <input v-model="newProveedor.persona.apellidos" type="text" class="form-control" id="modelApellidos" placeholder="Apellidos">
            </div>
         </div>
         <div class="col-md-5">
            <div class="form-group">
               <label for="modelCorreo">Correo electronico</label>
               <input v-model="newProveedor.persona.correo" type="email" class="form-control" id="modelCorreo" placeholder="Correo electronico">
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <label for="modelTipoDoc">Tipo Documento</label>
               <select v-model="newProveedor.persona.id_tipos_documento" id="modelTipoDoc" class="form-control">
                  <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.tipo}}-{{tipo.descripcion}}</option>
               </select>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="modelNumDoc">Numero documento</label>
               <input v-model="newProveedor.persona.num_documento" type="text" class="form-control" id="modelNumDoc" placeholder="Numero de documento">
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelDireccion">Direccion</label>
               <input v-model="newProveedor.persona.direccion" type="text" class="form-control" id="modelDireccion" placeholder="Direccion">
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelTelefono">Telefono</label>
               <input v-model="newProveedor.persona.telefono" type="text" class="form-control" id="modelTelefono" placeholder="Telefono">
            </div>
         </div>
      </div>
      <div class="form-group" v-if="!newProveedor.id">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newProveedor)">Crear</button>
      </div>
      <div class="form-group" v-else>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.editData(newProveedor)">Editar</button>
      </div>
   </div>
</template>
<script>
export default {
   name: "form-new-proveedor",
   props: {
      model: {
         type: Object,
         required: true
      }
   },
   data(){
      return{
         newProveedor: this.model,
         tipos: ''
      }
   },
   watch: {
      model(data){
         this.newProveedor = data;
      }
   },
   created(){
      this.getTipoDocumentos();
   },
   methods: {
      getTipoDocumentos(){
         axios.get('/tiposDocumentos').then((response) => {
            this.tipos = response.data;
         });
      }
   }
}
</script>
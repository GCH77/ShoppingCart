<template>
   <div>
      <div class="form-row">
         <fieldset class="col-md-12">
            <legend style="font-size: 20px; color: gray;">Datos de la empresa</legend>
            <div class="row">
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
            </div>
         </fieldset>
      </div>
      <div class="form-row">      
         <fieldset class="col-md-12">
            <legend style="font-size: 20px; color: gray;">Datos de la empresa</legend>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="modelNombres">Nombres</label>
                     <input v-model="newProveedor.nombre" type="text" class="form-control" id="modelNombres" placeholder="Nombres">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="modelApellidos">Apellidos</label>
                     <input v-model="newProveedor.apellidos" type="text" class="form-control" id="modelApellidos" placeholder="Apellidos">
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group">
                     <label for="modelCorreo">Correo electronico</label>
                     <input v-model="newProveedor.correo" type="email" class="form-control" id="modelCorreo" placeholder="Correo electronico">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="modelTipoDoc">Tipo Documento</label>
                     <select v-model="newProveedor.id_tipos_documento" id="modelTipoDoc" class="form-control">
                        <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.tipo}}-{{tipo.descripcion}}</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="modelNumDoc">Numero documento</label>
                     <input v-model="newProveedor.num_documento" type="text" class="form-control" id="modelNumDoc" placeholder="Numero de documento">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="modelDireccion">Direccion</label>
                     <input v-model="newProveedor.direccion" type="text" class="form-control" id="modelDireccion" placeholder="Direccion">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="modelTelefono">Telefono</label>
                     <input v-model="newProveedor.telefono" type="text" class="form-control" id="modelTelefono" placeholder="Telefono">
                  </div>
               </div>
            </div>
         </fieldset>
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
         if (data.persona) {
            this.newProveedor.nombre= data.persona.nombre;
            this.newProveedor.apellidos= data.persona.apellidos;
            this.newProveedor.num_documento= data.persona.num_documento;
            this.newProveedor.correo= data.persona.correo;
            this.newProveedor.id_tipos_documento= data.persona.id_tipos_documento;
            this.newProveedor.direccion= data.persona.direccion;
            this.newProveedor.telefono= data.persona.telefono;
         }
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
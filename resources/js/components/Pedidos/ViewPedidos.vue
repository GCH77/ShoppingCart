<template>
   <div>
      <table-component 
         :headers="cabeceras" 
         :model="pedido" 
         getUrl="pedidos"
         title="Lista de Pedidos"
         titleCreate="Agregar Pedido"
         titleEdit="Editar Pedido"
         :showPedido="true"
         @itemToDelete="itemToDelete=$event"
         @statusPedido="itemToChangeStatus=$event; statusInicial=$event.statusProgress"
         :reload-items="reloadItems"
      >
         <template #colums="props">
            <td>{{props.id}}</td>
            <td>{{props.empresas.razon_social}}</td>
            <td>{{props.cantidad}}</td>
            <td>{{props.productos.nombre}}</td>
            <td>{{props.statusProgress === 0 ? 'En progreso' : 'Recibido'}}</td>
            <td>{{props.created_at}}</td>
         </template>

         <template #newProduct="props">
            <form-new-pedido :model="props"></form-new-pedido>
         </template>

         <!-- Contenido para el modal -->
         <template #contentConfirmation>
            <h4>Estas seguro de borrar el pedido:</h4>
            <table class="table table-sm" v-if="itemToDelete">
               <thead>
                  <tr>
                     <th v-for="(header, index) in cabeceras" :key="index">{{header}}</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">{{itemToDelete.id}}</th>
                     <td>{{itemToDelete.empresas.razon_social}}</td>
                     <td>{{itemToDelete.cantidad}}</td>
                     <td>{{itemToDelete.productos.nombre}}</td>
                     <td>{{itemToDelete.statusProgress === 0 ? 'En progreso' : 'Recibido'}}</td>
                     <td>{{itemToDelete.created_at}}</td>
                  </tr>
               </tbody>
            </table>
         </template>

      </table-component>

      <!-- Modal para el cambio de estado del pedido -->
      <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Progreso del pedido</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="resetStatus">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                  <div class="alert alert-info" role="alert">
                     Nota. El pedido una vez creado se crea con estado "En Progreso". Sin embargo, una vez
                     confirmada la llegada del pedido es necesario cambiar el estado a "Recibido".
                  </div>
                  <table class="table table-sm" v-if="itemToChangeStatus">
                     <thead>
                        <tr>
                           <th v-for="(header, index) in cabeceras" :key="index">{{header}}</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th scope="row">{{itemToChangeStatus.id}}</th>
                           <td>{{itemToChangeStatus.empresas.razon_social}}</td>
                           <td>{{itemToChangeStatus.cantidad}}</td>
                           <td>{{itemToChangeStatus.productos.nombre}}</td>
                           <td>{{itemToChangeStatus.statusProgress === 0 ? 'En progreso' : 'Recibido'}}</td>
                           <td>{{itemToChangeStatus.created_at}}</td>
                           <td>
                              <div class="custom-control custom-switch">
                                 <input 
                                    type="checkbox" 
                                    class="custom-control-input"
                                    value="0"
                                    v-model="itemToChangeStatus.statusProgress"
                                    :id="'switch'+itemToChangeStatus.id" 
                                    @click="changeStatus(itemToChangeStatus.id)"
                                 >
                                 <label class="custom-control-label" :for="'switch'+itemToChangeStatus.id">{{textStatus}}</label>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetStatus">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveChangeStatusPedido">Save changes</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: "view-pedidos",
   data(){
      return{
         cabeceras: ['#', 'Proveedor', 'Cantidad', 'Productos', 'Estado', 'Fecha pedido'],
         pedido: {
            id_empresa: '',
            id_producto: '',
            proveedor_producto: [],
            cantidad: '',
            nombreP: '',
            descripcionP: '',
            id_marca: '',
            id_genero: ''
         },
         itemToDelete: '',
         itemToChangeStatus: '',
         status: false,
         statusInicial: '',
         reloadItems: {}
      }
   },
   watch: {
      'itemToChangeStatus.statusProgress'(newValue, oldValue){
         console.log("newValue: "+newValue);
         console.log("oldValue: "+oldValue);
         console.log("Estado anterior: "+ this.itemToChangeStatus.statusProgress); 
         if (newValue === 0 || newValue === false) {
            console.log("Si es CERO o FALSE");
            this.itemToChangeStatus.statusProgress = 0;
         }else if(newValue === 1 || newValue === true){
            this.itemToChangeStatus.statusProgress = 1;
         }  
         console.log("Estado actual: "+ this.itemToChangeStatus.statusProgress); 
      }
   },
   computed: {
      textStatus(){
         return this.itemToChangeStatus.statusProgress === 0 ? "En progreso" : "Recibido";
      }
   },
   methods: {
      saveChangeStatusPedido(){
         axios.put('pedidos/'+this.itemToChangeStatus.id, this.itemToChangeStatus).then((response) => {
            this.reloadItems = {
               reload: true,
               newItem: response.data
            };
         }).catch((error) => {
            this.reloadItems = {
               reload: false,
               message: 'No se pudo cambiar el estado del pedido.',
               status: error.response.status
            };
         });
      },
      changeStatus(id){
         this.status = document.getElementById("switch"+id).checked;
         console.log(this.status);
         if (this.status) {
            console.log("TRUE");
            this.itemToChangeStatus.statusProgress = 1;
            // this.status = true;
         }else {
            console.log("FALSE");
            this.itemToChangeStatus.statusProgress = 0;
         }
      },
      resetStatus(){
         this.itemToChangeStatus.statusProgress = this.statusInicial;
         // this.itemToChangeStatus = '';
      }
   }
}
</script>
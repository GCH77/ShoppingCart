<template id="table-component">
   <div>
      <div class="card">
         <div class="card-header">
            <div class="row justify-content-between">
               <div class="col-md4">
                  <div class="ml-3"><h4>{{ title }}</h4></div>
               </div>
               <div class="col-md4">
                  <div class="mr-2">
                     <button 
                        type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#newModal" 
                        data-backdrop="static" 
                        data-keyboard="false"
                     >
                        <i class="fas fa-plus"></i> Nuevo
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body">
            <table class="table table-hover" v-if="items.length > 0">
               <thead>
                  <tr>
                     <th scope="col" v-for="title in headers" :key="title">{{title}}</th>
                  </tr>
               </thead>
               <tbody>
                  <tr v-for="item in items" :key="item.id">
                     <slot name="colums" v-bind="item"></slot>
                     <td>
                        <!-- Editar -->
                        <button 
                           v-if="!showPedido"
                           type="button" 
                           class="btn btn-outline-info btn-sm" 
                           @click="editItem(item)"
                           data-toggle="modal" 
                           data-target="#newModal"
                           data-backdrop="static" 
                           data-keyboard="false"
                        >
                           <i class="fas fa-edit"></i>
                        </button>
                        <!-- Ver -->
                        <button 
                           v-if="showPedido"
                           type="button" 
                           class="btn btn-outline-info btn-sm"
                           data-toggle="modal"
                           data-target="#exampleModal"
                           data-backdrop="static" 
                           data-keyboard="false"
                           @click="$emit('statusPedido', item)"
                           >
                              <i class="far fa-eye"></i>
                        </button>
                        <!-- Eliminar -->
                        <button 
                           v-if="showPedido || true"
                           type="button" 
                           class="btn btn-outline-danger btn-sm"
                           @click="showConfirmDialog(item)"
                           data-toggle="modal"
                           data-target="#myModal2"
                           data-backdrop="static" 
                           data-keyboard="false"
                           >
                              <i class="fas fa-trash-alt"></i>
                        </button>
                     </td>
                  </tr>
               </tbody>
            </table>
            <div v-else>
               <h4>No se encontraron registros</h4>   
            </div>          
         </div>
      </div>
      <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">{{ titleModal }}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearModel">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                  <slot name="newProduct" v-bind="crudModel"></slot>                     
               </div>
            </div>
         </div>
      </div>

      <!-- Modal de confirmacion -->
      <div id="myModal2" class="modal fade">
         <div class="modal-dialog modal-confirm" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: #1772bd;">
                  <div class="icon-box">
                     <i class="fas fa-question"></i>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body text-center">
                  <slot name="contentConfirmation"></slot>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="itemsConfirmDialog = ''">Cancelar</button>
                  <button class="btn btn-success" data-dismiss="modal" @click="deleteItem(itemsConfirmDialog)">Aceptar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal para los errores -->
      <div id="myModal" class="modal fade">
         <div class="modal-dialog modal-confirm" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: #e85e6c;">
                  <div class="icon-box">
                     <i class="fas fa-times"></i>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body text-center">
                  <h4>Ooops!</h4>
                  <slot name="contentError"></slot>
                  <h5 v-if="errorDialogMessage">{{ errorDialogMessage.message}}</h5>
                  <h5 v-else>Something went wrong</h5>
                  <button class="btn btn-success" data-dismiss="modal">Try Again</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
export default {
   name: "table-component",
   inheritAttrs: false,
   props: {
      model: {
         type: Object,
         required: true
      },
      headers:{
         type: Array,
         required: true
      },
      getUrl: {
         type: String,
         required: true
      },
      title: {
         type: String,
         required: true
      },
      titleCreate: {
         type: String,
         required: true
      },
      titleEdit: {
         type: String,
         required: true
      },
      showPedido: {
         type: Boolean,
         required: false,
         default: false
      },
      reloadItems: {
         type: Object,
         required: false
      }
   },
   created(){
      this.crudModel = this.model;
      if (this.items.length <= 0) {
         this.getAllRegisters();
      }else{
         console.log("Ya estoy lleno");
      }
   },
   data(){
      return{
         openNewModal: false,
         items: [],
         crudModel: null,
         isEdition: false,
         titleModal: this.titleCreate,
         errorDialogMessage: {},
         itemsConfirmDialog: '',

      }
   },
   watch: {
      isEdition(){
         return this.isEdition ? this.titleModal = this.titleEdit : this.titleModal = this.titleCreate;
      },
      reloadItems(data){
         if (data.reload) {
            toastr.success("Estado del pedido fue actualizado!", "Edicion");
         }else {
            this.errorDialogMessage = {
               message: data.message,
               status: status
            };
            $('#myModal').modal('show');
         }
      },deep: true
   },
   methods: {
      prueba(){
         // toastr.success("Funciona men!", "Success");
      },
      editItem(item){
         this.isEdition = true;
         this.crudModel = item;
      },
      showConfirmDialog(item){
         this.itemsConfirmDialog = item;
         this.$emit('itemToDelete', item);
      },
      deleteItem(item){
         console.log(item);
         console.log("Borrando.........");
         axios.delete(this.getUrl+'/'+item.id).then((response) => {
            this.items.filter((value, index) => {
               if (value.id === item.id) {
                     this.items.splice(index, 1);
               }
            })
            toastr.success("Registro borrado correctamente!", "Borrar");
         }).catch((error) => {
            console.log("Si hay Error");
            console.log(error.response.status);
            if (error.response.data.message.slice(0, 15) === 'SQLSTATE[23000]') {
               this.errorDialogMessage = {
                  message: 'No se puede borrar este registro porque hay otros registros que dependen de él.',
                  status: error.response.status
               };
               this.clearModel();
               $('#myModal').modal('show');
            }else {
               console.log("Entre en el ELSE");
               this.clearModel();
               this.catchErrors(error.response.status);
            }
            // console.log(error.response);
         });
      },
      saveData(data){
         axios.post(this.getUrl, data).then((response) => {
            this.items.push(response.data);
            console.log(response.data);
            toastr.success("Registro creado correctamente!", "Crear");
         }).catch((error) => {
            if (error.response.data.message.slice(0, 15) === 'SQLSTATE[23000]') {
               this.errorDialogMessage = {
                  message: 'Campos obligatorios no fueron diligenciados',
                  status: error.response.status
               };
               this.clearModel();
               $('#myModal').modal('show');
            }else {
               this.clearModel();
               this.catchErrors(error.response.status);
            }
         });
         this.crudModel = this.model;
      },
      editData(data){
         axios.put(this.getUrl+'/'+data.id, data).then((response) => {
            this.items.filter((value, index) => {
               if (value.id === response.data.id) {
                  this.items.splice(index, 1, response.data);
               }
            });
            this.clearModel();
            toastr.success("Registro editado correctamente!", "Edicion");
         }).catch((error) => {
            if (error.response.data.message.slice(0, 15) === 'SQLSTATE[23000]') {
               this.errorDialogMessage = {
                  message: 'Campos obligatorios fueron borrados durante la edicion.',
                  status: error.response.status
               };
               this.clearModel();
               $('#myModal').modal('show');
            }else {
               this.clearModel();
               this.catchErrors(error.response.status);
            }
         });
      },
      getAllRegisters(){
         axios.get(this.getUrl).then((response) => {
            console.log(response);
            for (const item of response.data) {
               this.items.push(item);
            }
            // this.items = response
         }).catch((error) => {
            if (error.response.data.message.slice(0, 15) === 'SQLSTATE[23000]') {
               this.errorDialogMessage = {
                  message: 'No se pudo realizar la operacion',
                  status: error.response.status
               };
               $('#myModal').modal('show');
            }else {
               this.catchErrors(error.response.status);
            }
         });
      },
      clearModel(data){
         this.isEdition = false;
         console.log("Limpiando........");
         console.log(this.model);
         this.crudModel = this.model;
      },
      catchErrors(status){
         console.log("Si llega el estatus?");
         console.log(status);
         switch (status) {
            case 400:
               this.errorDialogMessage = {
                  message: 'El servidor no puede procesar esta solicitud.',
                  status: status
               };
               $('#myModal').modal('show');
               break;
            case 404:
               this.errorDialogMessage = {
                  message: 'El servidor no pudo encontrar el contenido solicitado.',
                  status: status
               };
               $('#myModal').modal('show');
               break;
            case 500:
               console.log("hellooooooooooooo");
               this.errorDialogMessage = {
                  message: 'Error interno del servidor',
                  status: status
               };
               $('#myModal').modal('show');
               break;
         
            default:
               break;
         }
      }
   }
}
</script>
<style lang="scss" scoped>
   #myModal2, #myModal {		
		color: #434e65;
		width: 90%;
      left: unset;
	}
	#myModal2 .modal-content, #myModal .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
      width: 100%;
	}
	#myModal2 .modal-header, #myModal .modal-header {
		border-bottom: none;   
      position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		// padding: 35px;
      display: block;
	}
   #myModal2 .modal-header div span, #myModal .modal-header div span{
      color: white;
      font-size: 40px;
   }
	#myModal2 h4, #myModal h4 {
		text-align: center;
		font-size: 36px;
		margin: 10px 0;
	}
	#myModal2 .form-control, #myModal2 .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	#myModal2 .close, #myModal .close {
        position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}
	#myModal2 .close:hover, #myModal .close:hover {
		opacity: 0.8;
	}
	#myModal2 .icon-box, #myModal .icon-box {
		color: #fff;		
		width: 95px;
		height: 95px;
		display: inline-block;
		border-radius: 50%;
		z-index: 9;
		border: 5px solid #fff;
		padding: 15px;
		text-align: center;
	}
	#myModal2 .icon-box i, #myModal .icon-box i {
		font-size: 58px;
		margin: -2px 0 0 -2px;
	}
	#myModal2 .modal-dialog, #myModal .modal-dialog {
		margin-top: 80px;
      max-width: 860px;
	}
   #myModal2 .btn, #myModal .btn {
        color: #fff;
        border-radius: 4px;
		background: #eeb711;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		border-radius: 30px;
		margin-top: 10px;
		padding: 6px 20px;
		min-width: 150px;
        border: none;
    }
	#myModal2 .btn:hover, #myModal .btn:focus {
		background: #eda645;
		outline: none;
	}
   #myModal2 .modal-footer, #myModal .modal-footer {
      justify-content: center;
   }
</style>
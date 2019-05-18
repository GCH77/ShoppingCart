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
                        <button 
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
                        <button 
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
      <dialog-component 
         @closeDialog="deleteItem($event)" 
         :errorDialogMessage=errorDialogMessage
         :itemsConfirmDialog=itemsConfirmDialog
      ></dialog-component>
   </div>
</template>
<script>
// import { mapState, mapActions } from 'vuex';
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
         itemsConfirmDialog: {},
         actionDelete: false
      }
   },
   watch: {
      isEdition(){
         return this.isEdition ? this.titleModal = this.titleEdit : this.titleModal = this.titleCreate;
      }
   },
   computed: {
      // ...mapState(['confirmDialog'])
   },
   methods: {
      // ...mapActions(['SetErrorDialogMessage']),
      prueba(){
         // toastr.success("Funciona men!", "Success");
      },
      editItem(item){
         this.isEdition = true;
         this.crudModel = item;
      },
      showConfirmDialog(item){
         this.itemsConfirmDialog = {
            id: item.id,
            rol: item.rol,
            descripcion: item.descripcion
         }
      },
      deleteItem(item){
         console.log(item);
         console.log("Borrando.........");
         axios.delete(this.getUrl+'/'+item).then((response) => {
            this.items.filter((value, index) => {
               if (value.id === item) {
                     this.items.splice(index, 1);
               }
            })
            toastr.success("Registro borrado correctamente!", "Borrar");
         }).catch((error) => {
            if (error.response.data.message.slice(0, 15) === 'SQLSTATE[23000]') {
               this.errorDialogMessage = {
                  message: 'No se puede borrar este registro porque hay otros registros que dependen de él.',
                  status: error.response.status
               };
               $('#myModal').modal('show');
            }else {
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
               $('#myModal').modal('show');
            }else {
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
               $('#myModal').modal('show');
            }else {
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
         });
      },
      clearModel(data){
         this.isEdition = false;
         this.crudModel = this.model;
      },
      catchErrors(status){
         switch (status) {
            case 400:
               this.errorDialogMessage = {
                  message: 'El servidor no puede procesar esta solicitud.',
                  status: error.response.status
               };
               $('#myModal').modal('show');
               break;
            case 404:
               this.errorDialogMessage = {
                  message: 'El servidor no pudo encontrar el contenido solicitado.',
                  status: error.response.status
               };
               $('#myModal').modal('show');
               break;
            case 500:
               this.errorDialogMessage = {
                  message: 'Error interno del servidor',
                  status: error.response.status
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

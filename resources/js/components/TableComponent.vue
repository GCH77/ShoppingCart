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
            <table class="table table-hover" v-if="items">
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
                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
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
         titleModal: this.titleCreate
      }
   },
   watch: {
      isEdition(){
         return this.isEdition ? this.titleModal = this.titleEdit : this.titleModal = this.titleCreate;
      }
   },
   methods: {
      editItem(item){
         this.isEdition = true;
         this.crudModel = item;
      },
      saveData(data){
         this.items.push(data);
         this.crudModel = '';
         this.openNewModal = false;
      },
      editData(data){
         console.log(data);
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
      }
   }
}
</script>

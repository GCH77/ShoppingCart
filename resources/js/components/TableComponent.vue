<template id="table-component">
   <div>
      <div class="card">
         <div class="card-header">
            <div class="row justify-content-between">
               <div class="col-md4">
                  Productos
               </div>
               <div class="col-md4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
                     Launch demo modal
                  </button>
                  <!-- <button type="button" class="btn btn-primary" @click="openNewModal = true">Nuevo</button> -->
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
                     <!-- <template v-for="item in items">
                        <th scope="row" v-for="val in item" :key="val.id">{{val}}</th>
                     </template> -->
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- <template v-if="openNewModal"> -->
         <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <slot name="newProduct" v-bind="crudModel"></slot>                     
                  </div>
               </div>
            </div>
         </div>
         <!-- <button type="button" class="btn btn-success" @click="saveData">Enviar</button> -->
      <!-- </template> -->
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
         crudModel: null
      }
   },
   methods: {
      saveData(data){
         this.items.push(data);
         this.crudModel = '';
         this.openNewModal = false;
      },
      getAllRegisters(){
         axios.get(this.getUrl).then((response) => {
            console.log(response);
            for (const item of response.data) {
               this.items.push(item);
            }
            // this.items = response
         });
      }
   }
}
</script>

<template id="table-component">
   <div>
      <div class="card">
         <div class="card-header">
            <div class="row justify-content-between">
               <div class="col-md4">
                  Productos
               </div>
               <div class="col-md4">
                  <button type="button" class="btn btn-primary" @click="openNewModal = true">Nuevo</button>
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
      <template v-if="openNewModal">
         <slot name="newProduct" v-bind="crudModel" @eventForm="saveData(data)"></slot>
         <!-- <button type="button" class="btn btn-success" @click="saveData">Enviar</button> -->
      </template>
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
      }
   },
   created(){
      this.crudModel = this.model;
   },
   data(){
      return{
         openNewModal: false,
         items: [
            {id: 1, nombre: "Arroz Diana", precio: 1500}
         ],
         crudModel: null
      }
   },
   methods: {
      saveData(data){
         this.items.push(data);
         this.crudModel = '';
         this.openNewModal = false;
      }
   }
}
</script>

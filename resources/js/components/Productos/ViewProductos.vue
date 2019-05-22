<template>
   <table-component 
      :headers="cabeceras" 
      :model="producto" 
      getUrl="list"
      title="Lista de Productos"
      titleCreate="Nuevo producto"
      titleEdit="Editar producto"
      @itemToDelete="itemToDelete=$event"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nombre}}</td>
         <td>{{props.descripcion ? props.descripcion : '------'}}</td>
         <td>
            <div class="row" v-if="props.colores_producto">
               <template v-for="(middle, index) in props.colores_producto">
                  <div class="picker-color" :key="index" :style="{backgroundColor: middle.color.hexa}"></div>
                  <!-- <span :key="middle">{{middle.color.color}}</span> -->
               </template>
            </div> 
            <span v-else>-----</span>
         </td>         
      </template>  

      <template #newProduct="props">
         <form-new-product :model="props"></form-new-product>
      </template>

      <!-- Contenido para el modal -->
      <template #contentConfirmation>
         <h4>Estas seguro de borrar el producto:</h4>
         <table class="table table-sm" v-if="itemToDelete">
            <thead>
               <tr>
                  <th v-for="(header, index) in cabeceras" :key="index">{{header}}</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{itemToDelete.id}}</td>
                  <td>{{itemToDelete.nombre}}</td>
                  <td>{{itemToDelete.descripcion ? itemToDelete.descripcion : '------'}}</td>
                  <td>
                     <div class="row" v-if="itemToDelete.colores_producto">
                        <template v-for="(middle, index) in itemToDelete.colores_producto">
                           <div class="picker-color" :key="index" :style="{backgroundColor: middle.color.hexa}"></div>
                           <!-- <span :key="middle">{{middle.color.color}}</span> -->
                        </template>
                     </div> 
                     <span v-else>------</span>
                  </td>
               </tr>
            </tbody>
         </table>
      </template>

   </table-component>
</template>
<script>
export default {
   name: "view-productos",
   data(){
      return{
         cabeceras: ['#', 'Nombre', 'Descripcion', 'Colores'],
         producto: {
            nombre: '',
            descripcion: ''
         },
         itemToDelete: ''
      }
   },
   methods: {

   }
}
</script>

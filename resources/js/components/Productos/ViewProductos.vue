<template>
   <table-component 
      :headers="cabeceras" 
      :model="producto" 
      getUrl="/productos"
      title="Lista de Productos"
      titleCreate="Nuevo producto"
      titleEdit="Editar producto"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nombre}}</td>
         <td>{{props.descripcion}}</td>
         <td>
            <div class="row">
               <template v-for="(middle, index) in props.colores_producto">
                  <div class="picker-color" :key="index" :style="{backgroundColor: middle.color.hexa}"></div>
                  <!-- <span :key="middle">{{middle.color.color}}</span> -->
               </template>
            </div> 
         </td>         
      </template>       
      <template #newProduct="props">
         <form-new-product :model="props"></form-new-product>
      </template>
   </table-component>
</template>
<script>
export default {
   name: "view-productos",
   data(){
      return{
         cabeceras: ['#', 'Nombre', 'Descripcion', 'Colores', 'Acciones'],
         producto: {
            nombre: '',
            descripcion: ''
         }
      }
   },
   methods: {

   }
}
</script>

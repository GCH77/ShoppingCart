<template>
   <table-component :headers="cabeceras" :model="producto" getUrl="/personas">
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nombre}}</td>
         <td>{{props.descripcion}}</td>
         <td>
            <div class="row">
               <template v-for="(middle, index) in props.colores_producto">
                  <div style="height: 15px; width: 15px; border: 1px solid black; margin-left: 3px;" :key="index" :style="{backgroundColor: middle.color.hexa}"></div>
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
         cabeceras: ['#', 'Nombre', 'Descripcion', 'Color'],
         producto: {
            id: '',
            nombre: '',
            precio: ''
         }
      }
   },
   methods: {

   }
}
</script>

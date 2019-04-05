<template>
   <table-component :headers="cabeceras" :model="producto">
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nombre}}</td>
         <td>{{props.precio}}</td>
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
         cabeceras: ['#', 'Nombre producto', 'Precio'],
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

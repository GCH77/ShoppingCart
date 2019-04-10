<template>
   <table-component :headers="cabeceras" :model="producto" getUrl="/personas">
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nombre}}</td>
         <td>{{props.descripcion}}</td>
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
         cabeceras: ['#', 'Nombre', 'Apellidos'],
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

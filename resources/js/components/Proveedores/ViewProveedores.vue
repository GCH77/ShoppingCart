<template>
   <table-component 
      :headers="cabeceras" 
      :model="proveedor" 
      getUrl="proveedores"
      title="Lista de Proveedores"
      titleCreate="Agregar Proveedor"
      titleEdit="Editar Proveedor"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nit}}</td>
         <td>{{props.razon_social}}</td>
         <td>{{props.direccion}}</td>
         <td>{{props.nombre}}</td>
      </template>

      <template #newProduct="props">
         <form-new-proveedor :model="props"></form-new-proveedor>
      </template>

   </table-component>
</template>

<script>
export default {
   name: "view-proveedores",
   data(){
      return{
         cabeceras: ['#', 'Nit', 'Razon Social', 'Direccion', 'Representante Legal'],
         proveedor: {
            nit: '',
            razon_social: '',
            direccion: '',
            nombre: ''
         }
      }
   },
   methods: {

   }
}
</script>

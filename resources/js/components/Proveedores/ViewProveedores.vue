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
         <td>{{props.direccione}}</td>
         <td>{{props.persona.nombre}} {{props.persona.apellidos}}</td>
         <td>{{props.persona.correo}}</td>
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
         cabeceras: ['#', 'Nit', 'Razón Social', 'Direccion', 'Representante Legal','Correo electrónico'],
         proveedor: {
            nit: '',
            razon_social: '',
            direccione: '',
            persona: {
               nombre: '',
               apellidos: '',
               num_documento: '',
               correo: '',
               id_tipos_documento: '',
               direccion: '',
               telefono: ''               
            }
         }
      }
   },
   methods: {

   }
}
</script>

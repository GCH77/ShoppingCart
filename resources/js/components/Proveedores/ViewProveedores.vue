<template>
   <table-component 
      :headers="cabeceras" 
      :model="proveedor" 
      getUrl="proveedores"
      title="Lista de Proveedores"
      titleCreate="Agregar Proveedor"
      titleEdit="Editar Proveedor"
      @itemToDelete="itemToDelete=$event"
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

      <!-- Contenido para el modal -->
      <template #contentConfirmation>
         <h4>Estas seguro de borrar el proveedor:</h4>
         <table class="table table-sm" v-if="itemToDelete">
            <thead>
               <tr>
                  <th v-for="(header, index) in cabeceras" :key="index">{{header}}</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{itemToDelete.id}}</td>
                  <td>{{itemToDelete.nit}}</td>
                  <td>{{itemToDelete.razon_social}}</td>
                  <td>{{itemToDelete.direccione}}</td>
                  <td>{{itemToDelete.persona.nombre}} {{itemToDelete.persona.apellidos}}</td>
                  <td>{{itemToDelete.persona.correo}}</td>
               </tr>
            </tbody>
         </table>
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
            nombre: '',
            apellidos: '',
            num_documento: '',
            correo: '',
            id_tipos_documento: '',
            direccion: '',
            telefono: ''
         },
         itemToDelete: ''
      }
   },
   methods: {

   }
}
</script>

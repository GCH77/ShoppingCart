<template>
   <table-component 
      :headers="cabeceras"
      :model="usuario" 
      getUrl="usuarios"
      title="Lista de Usuarios"
      titleCreate="Nuevo Usuario"
      titleEdit="Editar Usuario"
      @itemToDelete="itemToDelete=$event"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.nombre}} {{props.apellidos}}</td>
         <td>{{props.tipo_documento.tipo}} - {{props.num_documento}}</td>
         <td>{{props.direccion}}</td>
         <td>{{props.telefono}}</td>
         <td>{{props.user ? props.user.username : '  ---  '}}</td>
         <td>{{props.correo}}</td>
         <td>{{props.rol.rol}}</td>
         <!-- <template v-for="(rol, index) in props.personas_roles">
            <td :key="index">{{rol.roles.rol}}</td>
         </template> -->
      </template>       
      <template #newProduct="props">
         <form-new-usuario :model="props"></form-new-usuario>
      </template>

      <!-- Contenido para el modal -->
      <template #contentConfirmation>
         <h4>Estas seguro de borrar el usuario:</h4>
         <table class="table table-sm" v-if="itemToDelete">
            <thead>
               <tr>
                  <th v-for="(header, index) in cabeceras" :key="index">{{header}}</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">{{itemToDelete.id}}</th>
                  <td>{{itemToDelete.nombre}} {{itemToDelete.apellidos}}</td>
                  <td>{{itemToDelete.tipo_documento.tipo}} - {{itemToDelete.num_documento}}</td>
                  <td>{{itemToDelete.direccion}}</td>
                  <td>{{itemToDelete.telefono}}</td>
                  <td>{{itemToDelete.user ? itemToDelete.user.username : '  ---  '}}</td>
                  <td>{{itemToDelete.correo}}</td>
                  <td>{{itemToDelete.rol.rol}}</td>
               </tr>
            </tbody>
         </table>
      </template>

   </table-component>
</template>
<script>
export default {
   name: "view-usuarios",
   data(){
      return{
         cabeceras: ['#', 'Nombres y Apellidos', 'Documento Identidad', 'Direccion', 'Telefono','Username', 'Correo', 'Rol'],
         usuario: {
            nombre: '',
            apellidos: '',
            num_documento: '',
            nameuser: '',
            correo: '',
            id_rol: '',
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
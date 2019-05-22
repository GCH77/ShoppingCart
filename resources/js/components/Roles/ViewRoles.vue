<template>
   <table-component 
      :headers="cabeceras" 
      :model="rol" 
      getUrl="roles"
      title="Lista de Roles"
      titleCreate="Nuevo Rol"
      titleEdit="Editar Rol"
      @itemToDelete="itemToDelete=$event"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.rol}}</td>
         <td>{{props.descripcion}}</td>
      </template>

      <template #newProduct="props">
         <form-new-rol :model="props"></form-new-rol>
      </template>

      <!-- Contenido para el modal -->
      <template #contentConfirmation>
         <h4>Estas seguro de borrar el rol:</h4>
         <table class="table table-sm" v-if="itemToDelete">
            <thead>
               <tr>
                  <th v-for="(header, index) in cabeceras" :key="index">{{header}}</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">{{itemToDelete.id}}</th>
                  <td>{{itemToDelete.rol}}</td>
                  <td>{{itemToDelete.descripcion}}</td>
               </tr>
            </tbody>
         </table>
      </template>
   </table-component>
</template>

<script>
export default {
   name: "view-roles",
   data(){
      return{
         cabeceras: ['#', 'Rol', 'Descripcion'],
         rol: {
            rol: '',
            descripcion: '',
            permisos_roles_mod_func: []
         },
         itemToDelete: ''
      }
   },
   methods: {

   }
}
</script>

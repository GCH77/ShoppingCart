<template>
   <table-component 
      :headers="cabeceras" 
      :model="rol" 
      getUrl="roles"
      title="Lista de Roles"
      titleCreate="Nuevo Rol"
      titleEdit="Editar Rol"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.rol}}</td>
         <td>{{props.descripcion}}</td>
      </template>

      <template #newProduct="props">
         <form-new-rol 
         :model="props"
         @update="UpdateRol(index)"
         @delete="DeleteRol(index)">
         >
         </form-new-rol>
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
            descripcion: ''
         },
         roles: [],
      }
   },
   methods: {
      UpdateRol(index) {
         this.roles[index]=rol;
        },
      DeleteRol(index) {
         this.roles.splice(index, 1);
        }
   }
}
</script>

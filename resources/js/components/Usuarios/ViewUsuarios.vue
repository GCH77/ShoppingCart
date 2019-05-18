<template>
   <table-component 
      :headers="cabeceras"
      :model="usuario" 
      getUrl="usuarios"
      title="Lista de Usuarios"
      titleCreate="Nuevo Usuario"
      titleEdit="Editar Usuario"
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
   </table-component>
</template>
<script>
export default {
   name: "view-usuarios",
   data(){
      return{
         cabeceras: ['#', 'Nombres y Apellidos', 'Documento Identidad', 'Direccion', 'Telefono','Username', 'Correo', 'Rol', 'Acciones'],
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
         }
      }
   },
   methods: {

   }
}
</script>
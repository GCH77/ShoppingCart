<template>
   <table-component 
      :headers="cabeceras" 
      :model="pedido" 
      getUrl="pedidos"
      title="Lista de Pedidos"
      titleCreate="Agregar Pedido"
      titleEdit="Editar Pedido"
   >
      <template #colums="props">
         <td>{{props.id}}</td>
         <td>{{props.razon_social}}</td>
         <!-- <td>{{props.productos.nombre}}</td> -->
        <td>
            <ul style="padding-left: 20px;">
            <template v-for="(item, index) in props.proveedor_producto">
                <li :key="index">{{item.productos.nombre}}</li>
            </template>
            </ul>
        </td>
         <td>{{props.created_at}}</td>
      </template>

      <template #newProduct="props">
         <form-new-pedido :model="props"></form-new-pedido>
      </template>

   </table-component>
</template>

<script>
export default {
   name: "view-pedidos",
   data(){
      return{
         cabeceras: ['#', 'Proveedor', 'Productos', 'Fecha','Acciones'],
         pedido: {
            nit: '',
            razon_social: '',
            direccione: '',
            proveedor_producto: [],
            pedido: 0
         }
      }
   },
   methods: {

   }
}
</script>
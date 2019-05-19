<template>
   <div>
      <div class="form-row">
         <div class="col-md-6">
            <div class="form-group">
               <label for="modelProveedor">Proveedor</label>
               <select id="modelProveedor" class="form-control" v-model="newPedido.razon_social">
                   <template v-for="(item, index) in proveedores">
                    <option :key="index" :value="item.id">{{item.razon_social}}</option>
                   </template>
               </select>
            </div>
         </div>
        <div class="col-md-6">
            <div class="form-group">
               <label for="modelProducto">Producto</label>
               <select class="selectpicker form-control" v-model="newPedido.pedido">
                    <optgroup label="Nuevo producto">
                        <option :value="0">Agregar nuevo Producto</option>
                    </optgroup>
                    <optgroup label="Existentes" v-if="newPedido.razon_social">
                        <template v-for="(item, index) in proveedores.find((el) => el.id === newPedido.razon_social).productos">
                            <option :key="index" :value="item.id">{{item.nombre}}</option>
                        </template>
                    </optgroup>
                </select>
            </div>
         </div>
         <template v-if="newPedido.pedido === 0">
            <div class="col-md-4">
                <div class="form-group">
                <label for="modelNombre">Nombre</label>
                <input type="text" class="form-control" id="modelNombre" placeholder="Nombre">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="modelDescripcion">Descripción</label>
                <input type="text" class="form-control" id="modelDescripcion" placeholder="Descripción">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="modelCodBarras">Código de barras</label>
                <input type="text" class="form-control" id="modelCodBarras" placeholder="Código de barras">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="radio" id="modelEstado">
                    <label for="modelEstado">estado</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="modelMarca">Marca</label>
                <select id="modelMarca" class="form-control">
                    <option >marca</option>
                </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="modelGenero">Género</label>
                <select id="modelGenero" class="form-control">
                    <option >genero</option>
                </select>
                </div>
            </div>
        </template>
         <div class="col-md">
            <div class="form-group">
               <label for="modelCantidad">Cantidad</label>
               <input type="text" class="form-control" id="modelCantidad" placeholder="Cantidad">
            </div>
         </div>
      </div>
      <div class="form-group" v-if="!newPedido.id">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newPedido)">Crear</button>
      </div>
      <div class="form-group" v-else>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
         <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.editData(newPedido)">Editar</button>
      </div>
   </div>
</template>
<script>
export default {
   name: "form-new-pedido",
   props: {
      model: {
         type: Object,
         required: true
      }
   },
   data(){
      return{
        newPedido: this.model,
        proveedores: [],
        empresas: '',
        productos: ''
      }
   },
   watch: {
      model(data){
        this.newPedido = data;
      },
      'newPedido.razon_social'(newVal){

      }
   },
   created(){
      this.getPedidosData();
   },
   methods: {
      async getPedidosData(){
        let auxiliar = []; 
        let products = [];
         await axios.get('/empresasProveedoras').then((response) => {
            this.proveedores = response.data;

            // console.log(this.newPedido);
         });
         if (this.proveedores.length > 0) {
             this.proveedores.forEach(element => {
                element.proveedor_producto.forEach(element2 => {
                    products.push({ id:  element2.productos.id, nombre: element2.productos.nombre });                    
                });
                auxiliar.push(
                    {   
                        id: element.id, 
                        razon_social: element.razon_social, 
                        productos: products
                    }
                );
                products = [];
            });
        }
        if (auxiliar.length > 0) {
            console.log("Entreeeee");
            console.log(auxiliar);
            this.proveedores = auxiliar;
        }

      }
   }
}
</script>
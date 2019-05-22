<template>
    <div>
        <div class="form-row">
            <fieldset class="col-md-12">
                <legend style="font-size: 20px; color: gray;">Proveedor</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="modelProveedor">Proveedor</label>
                            <select id="modelProveedor" class="form-control" v-model="newPedido.id_empresa">
                                <template v-for="(item, index) in proveedores">
                                <option :key="index" :value="item.id">{{item.razon_social}}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="modelProducto">Producto</label>
                            <select class="selectpicker form-control" v-model="newPedido.id_producto">
                                <optgroup label="Nuevo producto">
                                    <option :value="0">Agregar nuevo Producto</option>
                                </optgroup>
                                <optgroup label="Existentes" v-if="newPedido.id_empresa">
                                    <template v-for="(item, index) in proveedores.find((el) => el.id === newPedido.id_empresa).productos">
                                        <option :key="index" :value="item.id">{{item.nombre}}</option>
                                    </template>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="form-row">
            <fieldset class="col-md-12">
                <legend style="font-size: 20px; color: gray;">Producto</legend>
                <div class="row">

                    <template v-if="newPedido.id_producto === 0">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="modelNombre">Nombre</label>
                            <input type="text" class="form-control" id="modelNombre" placeholder="Nombre" v-model="newPedido.nombreP">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="modelMarca">Marca</label>
                            <select id="modelMarca" class="form-control" v-model="newPedido.id_marca">
                                <template v-for="item in marcas">
                                    <option :key="item.id" :value="item.id">{{item.marca}}</option>
                                </template>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="modelGenero">Género</label>
                            <select id="modelGenero" class="form-control" v-model="newPedido.id_genero">
                                <template v-for="item in generos">
                                    <option :key="item.id" :value="item.id">{{item.genero}}</option>
                                </template>
                            </select>
                            </div>
                        </div>
                    </template>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="modelCantidad">Cantidad</label>
                        <input type="text" class="form-control" id="modelCantidad" placeholder="Cantidad" v-model="newPedido.cantidad">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="form-group" v-if="!newPedido.id">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$parent.clearModel()">Cancelar</button>
            <button type="button" class="btn btn-success" data-dismiss="modal" @click="$parent.saveData(newPedido)">Crear</button>
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
        marcas: [],
        generos: []
      }
   },
   watch: {
      model(data){
          console.log("Ok... el modelo cambio");
          console.log(data);
        this.newPedido = data;
      }
   },
   created(){
      this.getPedidosData();
      this.getMarcas();
      this.getGeneros();
   },
   methods: {
       getMarcas(){
           axios.get('/marcas').then((response) => {
               this.marcas = response.data;
           });
       },
       getGeneros(){
           axios.get('/generos').then((response) => {
               this.generos = response.data;
           });
       },
        async getPedidosData(){
            let auxiliar = []; 
            let products = [];
            await axios.get('/empresasProveedoras').then((response) => {
            this.proveedores = response.data;
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
<template>
 <div class="main">
    <div class="container">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Ya casi esta lista tu compra!</h2>

      <div class="row">
        <div class="col-md-8 mb-4">
          <div class="card">
            <form class="card-body">
              <div class="row">

                <div class="col-md-6 mb-2">
                  <div class="md-form ">
                    <label for="modelTipoDoc">Tipo Documento</label>
                    <select v-model="data.id_tipos_documento" id="modelTipoDoc" class="form-control">
                        <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.tipo}}-{{tipo.descripcion}}</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <label for="numDocumento" class="">Numero de documento</label>
                    <input type="text" id="numDocumento" class="form-control" v-model="data.num_documento">
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="md-form ">
                    <label for="direccion" class="">Direccion</label>
                    <input type="text" id="direccion" class="form-control" v-model="data.direccion">
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <label for="telefono" class="">Telefono</label>
                    <input type="text" id="telefono" class="form-control" v-model="data.telefono">
                  </div>
                </div>

              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" @click.prevent="register">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
          <!-- Cart -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </div>
</template>
<script>
export default {
    props: ['attrs', 'id'],
    data() {
        return {
          tipos: '',
          data: {
            id: this.attrs.id,
            id_producto: this.id,
            id_tipos_documento: '',
            num_documento: '',
            direccion: '',
            telefono: ''
          }
        }
    },
    created(){
      this.getTipoDocumentos();
    },
    methods: {
        register(){
          axios.post('usuarios', this.data).then((response) => {
            this.$router.push({name: "listaproductos"});
          })
        },
        getTipoDocumentos(){
          axios.get('/tiposDocumentos').then((response) => {
              this.tipos = response.data;
          });
        }
    }
    
}
</script>


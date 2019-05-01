<template>
 <div class="main">
    <div class="container">
      <h2 class="my-5 h2 text-center">Ya casi esta lista tu compra!</h2>
      <div class="row">
        <div class="col-md-8 mb-4">
          <div class="card">
            <form class="card-body">
              <div class="row">

                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <select v-model="data.id_tipos_documento" id="modelTipoDoc" class="form-control">
						<option disabled selected value="">-- Tipo de Documento --</option>
						<option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.tipo}}-{{tipo.descripcion}}</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group md-form inner-addon left-addon">
					<i class="fas fa-address-card"></i>
                    <input type="text" id="numDocumento" class="form-control" required v-model="data.num_documento">
                    <label for="numDocumento" class="form-control-placeholder">Numero de documento</label>
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group md-form inner-addon left-addon">
					<i class="fas fa-map-marked-alt"></i>
                    <input type="text" id="userDireccion" class="form-control" required v-model="data.direccion">
                    <label for="userDireccion" class="form-control-placeholder">Direccion</label>
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group md-form inner-addon left-addon">
					<i class="fas fa-mobile-alt"></i>
                    <input type="text" id="numTelefono" class="form-control" required v-model="data.telefono">
                    <label for="numTelefono" class="form-control-placeholder">Telefono</label>
                  </div>
                </div>

              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" @click.prevent="register">Confirmar</button>

            </form>
          </div>

        </div>

        <div class="col-md-4 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Tu bolsa</span>
            <span class="badge badge-pill badge-primary">1</span>
          </h4>

          <ul class="list-group mb-3 z-depth-1">
           <template>
				<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<h6 class="my-0">{{item.nombre}}</h6>
					<small class="text-muted">{{item.marca.marca}}</small>
				</div>
				<span class="text-muted">${{item.almacenes[0].precio_venta}}</span>
            	</li>
            </template>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (COP)</span>
              <strong>${{item.almacenes[0].precio_venta}}</strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['attrs', 'item'],
    data() {
        return {
          tipos: '',
          data: {
            id: this.attrs.id,
            id_producto: this.item.id,
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
<style scoped>
/* enable absolute positioning */
.inner-addon { 
    position: absolute; 
}

/* style icon */
.inner-addon .fas {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .fas  { left:  0px;}
.right-addon .fas { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }

  .form-group {
  position: relative;
  margin-bottom: 1.5rem;
}

.form-control-placeholder {
  position: absolute;
  top: 0;
  padding: 7px 0 0 13px;
  transition: all 200ms;
  opacity: 0.5;
  padding-left: 30px;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
  font-size: 75%;
  transform: translate3d(0, -100%, 0);
  opacity: 1;
}
</style>


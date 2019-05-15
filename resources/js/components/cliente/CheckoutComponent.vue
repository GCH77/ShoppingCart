<template>
 <div class="main">
    <div class="container">
      <h2 class="my-5 h2 text-center">Ya casi esta lista tu compra!</h2>
      <div class="row">
        <div class="col-md-8 mb-4">
          <div class="card">
            <form class="card-body needs-validation" novalidate>
              <div class="row">

                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <select v-model="data.id_tipos_documento" id="modelTipoDoc" class="form-control">
                      <option disabled selected value="">-- Tipo de Documento --</option>
                      <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.tipo}}-{{tipo.descripcion}}</option>
                    </select>
                    <div id="successTipoDoc" class="valid-feedback">Success! You've done it.</div>
                    <div id="errorTipoDoc" class="invalid-feedback">No, you missed this one.</div>
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group md-form inner-addon left-addon">
					          <i class="fas fa-address-card"></i>
                    <input type="text" id="numDocumento" class="form-control" required v-model="data.num_documento">
                    <label for="numDocumento" class="form-control-placeholder">Numero de documento</label>
                    <div id="successNumDoc" class="valid-feedback">Success! You've done it.</div>
                    <div id="errorNumDoc" class="invalid-feedback">No, you missed this one.</div>
                  </div>
                </div>

                <div class="col-md-6 mb-2 mt-2">
                  <div class="form-group md-form inner-addon left-addon">
                    <i class="fas fa-map-marked-alt"></i>
                    <input type="text" id="userDireccion" class="form-control" required v-model="data.direccion">
                    <label for="userDireccion" class="form-control-placeholder">Direccion</label>
                    <div id="successDireccion" class="valid-feedback">Success! You've done it.</div>
                    <div id="errorDireccion" class="invalid-feedback">No, you missed this one.</div>
                  </div>
                </div>

                <div class="col-md-6 mb-2 mt-2">
                  <div class="form-group md-form inner-addon left-addon">
					          <i class="fas fa-mobile-alt"></i>
                    <input type="text" id="numTelefono" class="form-control" required v-model="data.telefono">
                    <label for="numTelefono" class="form-control-placeholder">Telefono</label>
                    <div id="successTelefono" class="valid-feedback">Success! You've done it.</div>
                    <div id="errorTelefono" class="invalid-feedback">No, you missed this one.</div>
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
            <span class="badge badge-pill badge-primary">{{item.quantity}}</span>
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
              <strong>${{ precio }}</strong>
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
            id: this.attrs.persona.id,
            id_producto: this.item.id,
            id_tipos_documento: '',
            num_documento: '',
            direccion: '',
            telefono: '',
            quantity: this.item.quantity
          }
        }
    },
    watch: {
      'data.id_tipos_documento'(newVal, oldVal){
        if (newVal != oldVal) {
          switch (newVal) {
            case 2:
            case 3:
            case 4:
            case 5:
              $("#errorTipoDoc").hide();
              $("#successTipoDoc").show();
              $("#modelTipoDoc").removeClass("form-control is-invalid").addClass("form-control is-valid");
              break;
            default:
              $("#successTipoDoc").hide();
              $("#errorTipoDoc").show();
              $("#modelTipoDoc").addClass("form-control is-invalid");
              break;
          }
        }
      },
      'data.num_documento'(newVal, oldVal){
        if (newVal != oldVal) {
          // console.log(newVal);
          if (newVal === "") {
            console.log("Entre");
            $("#successNumDoc").hide();
            $("#errorNumDoc").show();
            $("#numDocumento").removeClass("form-control is-valid").addClass("form-control is-invalid");
          }else {
            $("#errorNumDoc").hide();
            $("#successNumDoc").show();
            $("#numDocumento").removeClass("form-control is-invalid").addClass("form-control is-valid");
          }
        }
      },
      'data.direccion'(newVal, oldVal){
        if (newVal != oldVal) {
          // console.log(newVal);
          if (newVal === "") {
            console.log("Entre");
            $("#successDireccion").hide();
            $("#errorDireccion").show();
            $("#userDireccion").removeClass("form-control is-valid").addClass("form-control is-invalid");
          }else {
            $("#errorDireccion").hide();
            $("#successDireccion").show();
            $("#userDireccion").removeClass("form-control is-invalid").addClass("form-control is-valid");
          }
        }
      },
      'data.telefono'(newVal, oldVal){
        if (newVal != oldVal) {
          // console.log(newVal);
          if (newVal === "") {
            console.log("Entre");
            $("#successTelefono").hide();
            $("#errorTelefono").show();
            $("#numTelefono").removeClass("form-control is-valid").addClass("form-control is-invalid");
          }else {
            $("#errorTelefono").hide();
            $("#successTelefono").show();
            $("#numTelefono").removeClass("form-control is-invalid").addClass("form-control is-valid");
          }
        }
      }
    },
    created(){
      this.getTipoDocumentos();
    },
    computed: {
      precio(){
        return this.item.almacenes[0].precio_venta * this.item.quantity;
      }
    },
    methods: {
        register(){
          if (this.validacionInputs()) {
            console.log("Valido");
            axios.post('comprar', this.data).then((response) => {
              this.$router.push({name: "listaproductos"});
            toastr.success("Su compra se realizo correctamente!", "Compra");
            }); 
          }
        },
        getTipoDocumentos(){
          axios.get('/tiposDocumentos').then((response) => {
              this.tipos = response.data;
              this.tipos.splice(0, 1);
          });
        },
        validacionInputs(){
          let response = true;
          let select = document.getElementById("modelTipoDoc").selectedIndex;
          if (select <= 0) {
            response = false;
            $("#modelTipoDoc").addClass("form-control is-invalid");
          }
          if (this.data.num_documento === '') {
            response = false;
            $("#numDocumento").addClass("form-control is-invalid");            
          }
          if (this.data.direccion === '') {
            response = false;
            $("#userDireccion").addClass("form-control is-invalid");            
          }
          if (this.data.telefono === '') {
            response = false;
            $("#numTelefono").addClass("form-control is-invalid");            
          }
          return response;
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


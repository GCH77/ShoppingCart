<template>
 <div class="main">
    <div class="container">
      <h2 class="my-5 h2 text-center">Ya casi esta lista tu compra!</h2>
      <div class="row">
        <div class="col-md-7">
          <div class="card mb-4" 
            v-if="!validate">
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
              <button class="btn btn-primary btn-lg btn-block" type="submit" @click.prevent="register">
                <i class="fas fa-donate"></i>
                Confirmar y Comprar
              </button>

            </form>
          </div>
          <!-- Aparece cuando el num documento no este vacio -->
          <h4 class="d-flex align-items-center mb-3">
            <i class="fas fa-shopping-cart" style="color: gray; margin-right: 15px;"></i>
            <span class="text-muted" style="margin-right: 140px;">Tu lista de productos</span>
          </h4>
          <div class="card">
            <div class="row">
              <div class="col-md-4">
                <img :src="urlImg" class="image w-100">
              </div>
              <div class="col-md-8 px-3">
                <button type="button" class="close" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="card-block px-3">
                  <h5 class="card-title text-muted mt-1">{{item.marca.marca}}</h5>
                  <h5 class="card-subtitle mb-2"><strong>{{item.nombre}}</strong></h5>
                  <p class="card-text">Codigo: {{item.cod_barras}}</p>
                  <p class="card-text">Talla: {{item.tallas_producto[0].tallas.talla}}</p>
                  <p class="card-text mb-1">${{item.almacenes[0].precio_venta}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Resumen de tu orden</span>
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
          <button v-if="validate" class="btn btn-primary btn-lg btn-block" type="submit">
            <i class="fas fa-donate"></i>
            Comprar
          </button>
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
      console.log("Desde created - cheackoutComponent - item");
      console.log(this.item);
      this.getTipoDocumentos();
    },
    computed: {
      precio(){
        return this.item.almacenes[0].precio_venta * this.item.quantity;
      },
      urlImg(){
        let words = this.item.imagenes[0].ruta.split("\\");
        return "../../../../"+words[4]+"/"+words[7]+"/"+words[8];
      },
      validate(){
        if (
          this.attrs.persona.num_documento === '' || 
          this.attrs.persona.id_tipos_documento === '' ||
          this.attrs.persona.direccion === '' ||
          this.attrs.persona.telefono === ''
          ) {
          return false;
        }else {
          return true;
        }
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
.close{
  margin-right: 5px;
  margin-top: 5px;
  background: red;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  color: white;
}

.image {
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 5px;
  border-radius: 15%;
}
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


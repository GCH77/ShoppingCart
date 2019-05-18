<template>
   <div>
      <!-- Modal de confirmacion -->
      <div id="myModal2" class="modal fade">
         <div class="modal-dialog modal-confirm" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: #1772bd;">
                  <div class="icon-box">
                     <i class="fas fa-question"></i>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body text-center">
                  <h4>Esta seguro de borrar:</h4>
                  <h5>{{ itemsConfirmDialog.id }} - {{ itemsConfirmDialog.rol }}: {{ itemsConfirmDialog.descripcion }}</h5>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button class="btn btn-success" data-dismiss="modal" @click="$emit('closeDialog', itemsConfirmDialog.id)">Aceptar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal para los errores -->
      <div id="myModal" class="modal fade">
         <div class="modal-dialog modal-confirm" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: #e85e6c;">
                  <div class="icon-box">
                     <i class="fas fa-times"></i>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div><span>Error {{ errorDialogMessage.status }}</span></div>
               </div>
               <div class="modal-body text-center">
                  <h4>Ooops!</h4>
                  <h5>{{ errorDialogMessage.message ? errorDialogMessage.message : 'Something went wrong' }}</h5>
                  <button class="btn btn-success" data-dismiss="modal">Try Again</button>
               </div>
            </div>
         </div>
      </div> 
   </div>
</template>
<script>
export default {
   name: "DialogComponent",
   props: {
      errorDialogMessage: {
         type: Object
      },
      itemsConfirmDialog: {
         type: Object
      }
   },
   data(){
      return{

      }
   },
   methods: {

   }
}
</script>
<style lang="scss" scoped>
   .modal-confirm {		
		color: #434e65;
		width: 525px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
      position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		// padding: 35px;
      display: block;
	}
   .modal-confirm .modal-header div span{
      color: white;
      font-size: 40px;
   }
	.modal-confirm h4 {
		text-align: center;
		font-size: 36px;
		margin: 10px 0;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}
	.modal-confirm .close:hover {
		opacity: 0.8;
	}
	.modal-confirm .icon-box {
		color: #fff;		
		width: 95px;
		height: 95px;
		display: inline-block;
		border-radius: 50%;
		z-index: 9;
		border: 5px solid #fff;
		padding: 15px;
		text-align: center;
	}
	.modal-confirm .icon-box i {
		font-size: 58px;
		margin: -2px 0 0 -2px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
   .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #eeb711;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		border-radius: 30px;
		margin-top: 10px;
		padding: 6px 20px;
		min-width: 150px;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #eda645;
		outline: none;
	}
   .modal-confirm .modal-footer{
      justify-content: center;
   }
</style>

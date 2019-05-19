<template>
   <div>
      <button class="btn btn-default btn-lg btn-link" @click="redirect">
         <i class="fas fa-shopping-cart" style="color: #ffc000;"></i>
      </button>
      <span class="badge badge-notify">{{ shopCar.length }}</span>
   </div>
</template>
<script>
import { mapActions, mapState } from 'vuex';
export default {
   name: 'BadgeComponent',
   computed: {
      ...mapState(['shopCar'])
   },
   methods: {
      redirect(){
         this.$router.push({name: "checkout"});
      }
   }
}
</script>
<style lang="scss" scoped>
   .badge-notify {
      background: #3490dc;
      position: relative;
      top: -10px;
      left: -13px;
      color: white;
      border-radius: 50%;
   }
   .btn {
      border: 0;
      font-size: 21px;
      padding: 0;
      margin-top: 4px;
   }
</style>

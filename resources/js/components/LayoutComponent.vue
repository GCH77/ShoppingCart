<template>
   <div class="row justify-content-center">
        <div class="col-md-12">
            <router-view v-if="viewRender" name="cliente" v-bind="auth"></router-view>
            <side-menu-component v-else :auth="auth"></side-menu-component>
            <!-- <component :is="viewRender" v-bind="auth"></component> -->
        </div>
    </div>
</template>
<script>
export default {
    props: ['auth'],
    data(){
        return{
            viewRender: false
        }
    },
    created(){
        // console.log(this.auth);
        if (this.auth.id_rol == 4) {
            this.viewRender = true;
        }
    }
}
</script>

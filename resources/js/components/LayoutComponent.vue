<template>
   <div class="row justify-content-center">
        <div class="col-md-12">
            <template v-if="viewRender">
                <router-view name="cliente" v-bind="auth"></router-view>
            </template>
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
        console.log("Desde LayoutComponent - auth");
        console.log(this.auth.persona.id_rol);
        //TO CONFIG
        if (this.auth.persona.id_rol == 4) {
            this.viewRender = true;
        }
    }
}
</script>

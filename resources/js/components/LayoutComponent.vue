<template>
   <div class="row justify-content-center">
        <div class="col-md-12">
            <side-menu-component :auth="auth"></side-menu-component>
        </div>
    </div>
</template>
<script>
export default {
    props: ['auth'],
    created(){
        console.log(this.auth);
    }
}
</script>

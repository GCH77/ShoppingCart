<template>
    <!-- <product-details-component :item="item"></product-details-component> -->
    <checkout-component :attrs="$attrs" :id="$route.params.idItem"></checkout-component>
</template>
<script>
export default {
 name: 'view-checkout',
 props: ['item'],
    data() {
        return{
            
        }
    },
    created() {
        // console.log("mmmm");
        // console.log(this.$attrs);
        // console.log(this.$route.params);
    },
    methods: {
       
    }
}
</script>
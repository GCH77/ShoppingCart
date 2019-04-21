<template>
    <!-- <product-details-component :item="item"></product-details-component> -->
    <checkout-component></checkout-component>
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
        console.log("mmmm");
        console.log(this.$attrs);
    },
    methods: {
       
    }
}
</script>
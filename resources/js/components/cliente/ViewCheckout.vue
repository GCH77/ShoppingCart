<template>
    <!-- <product-details-component :item="item"></product-details-component> -->
    <checkout-component :attrs="$attrs" :item="$route.params.item"></checkout-component>
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
        // console.log(this.item);
        console.log("Desde ViewCheckOut - auth");
        console.log(this.$attrs);
        // console.log(this.$route.params);
    },
    methods: {
       
    }
}
</script>
<template>
    <product-details-component :item="item"></product-details-component>
</template>
<script>
export default {
 name: 'view-details',
 props: ['item'],
    data() {
        return{
            
        }
    },
    created() {
        
        // console.log("mmm");
        // console.log(this.item);
    },
    methods: {
       
    }
}
</script>
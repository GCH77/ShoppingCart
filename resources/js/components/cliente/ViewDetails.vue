<template>
    <product-details-component :item="item" :attrs="$attrs"></product-details-component>
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
        // console.log(this.$attrs);
    },
    methods: {
       
    }
}
</script>
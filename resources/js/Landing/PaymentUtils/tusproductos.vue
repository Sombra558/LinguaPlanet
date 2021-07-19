<template>
<div class=" mx-2 mb-2 mt-3 py-1 pl-3" style=" background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;">
    <p style="font-family: 'TitilliumWeb-SemiBold';" class="m-0 text-left">Tus Productos</p>
    <p style="font-family: 'TitilliumWeb-Regular';" class="m-0 text-left" v-if="cart.length>1">{{cart.length}} Productos</p>
    <p style="font-family: 'TitilliumWeb-Regular';" class="m-0 text-left" v-else>{{cart.length}} Producto</p>
</div>
</template>

<script>
import { mapState } from "vuex";
    export default {
        name:"tus-pedidos",
        mounted () {
            var micart = localStorage.getItem('mycartweldbear51205011245569');
                if (micart) {
                    micart = JSON.parse(micart);
                    this.$store.commit("setCart",  micart);
                }
        },
         computed: {
        ...mapState({
                cart: (state) => state.cart,
        }),
    }
    
    }

</script>

<style lang="scss" scoped>

</style>
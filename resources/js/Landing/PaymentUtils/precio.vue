<template>
  <span class="h1 bold mb-0" style="font-size: 2rem;">USD {{ precio }}</span>
</template>

<script>
import { mapState } from "vuex";
    export default {
        name:"articulos",
        props:['plan'],
        computed: {
        ...mapState({
                cupon: (state) => state.cupon,
        }),
      precio() {
            var precio=this.plan.precio;
            if (this.cupon) {
                if (this.cupon.tipo_descuento==='Moneda') {
                    return Number(precio - this.cupon.valor).toFixed(1);
                }else{
                    return Number(precio - precio*this.cupon.valor/100).toFixed(1);
                }
            }else{
                return precio.toFixed(1);
            }
            
        },
    }
        
    }
</script>

<style lang="scss" scoped>

</style>
<template>
    <div>
        <input type="hidden" name="currency" value="usd">
        <input type="hidden" name="plan_id" :value="plan.id">
        <input type="hidden" name="value"  :value="precio"> 
        <input v-if="cupon" type="hidden" name="cupon_id"  :value="cupon.id">    
    </div>
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
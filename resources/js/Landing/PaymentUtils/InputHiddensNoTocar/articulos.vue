<template>
    <div>
        <input type="hidden" name="articulos" :value="JSON.stringify(cart)">
        <input type="hidden" name="preciopedido" :value="precio">
        <input type="hidden" name="value" :value="precio">
    </div>
</template>

<script>
import { mapState } from "vuex";
    export default {
        name:"articulos",
        mounted () {
            var micart = localStorage.getItem('mycart');
                if (micart) {
                    micart = JSON.parse(micart);
                    this.$store.commit("setCart",  micart);
                }
        },
         computed: {
        ...mapState({
                cart: (state) => state.cart,
        }),
      precio() {
            var precio=0;
            this.cart.forEach(articulo => {
                if (articulo.tipo==='curso') {
                    if (articulo.estadocondicionpago===1) {
                        if (articulo.tipopago==="cuotas") {
                            precio=precio+articulo.admision;
                        }else{
                            precio=precio+articulo.precio;
                        }
                    }else{
                        precio=precio+articulo.precio;
                    }     
                }else{
                    precio=precio + Number(articulo.precio*articulo.cantidad)
                }
                });
            return precio.toFixed(1);
        },
    }
        
    }
</script>

<style lang="scss" scoped>

</style>
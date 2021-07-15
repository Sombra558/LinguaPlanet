<template>
    <div style="background: #FBFFF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;" class="p-3 mt-3">
        <h5 class="w-100 pb-2" style="border-bottom: 1px solid rgba(107, 108, 107, 0.3);font-family: 'TitilliumWeb-SemiBold';">Detalles de pago</h5>
        <div class="row m-0 justify-content-between">
            <p style="font-family: 'TitilliumWeb-Regular';">Costo de productos:</p>
            <p style="font-family: 'TitilliumWeb-Regular';">{{precio}}$</p>
        </div>
         <div class="row m-0 justify-content-between">
            <p style="font-family: 'TitilliumWeb-Regular'; font-size:20px; color:#52AA1C;">Total:</p>
            <p style="font-family: 'TitilliumWeb-Regular'; font-size:20px; color:#52AA1C;">{{precio}}$</p>
        </div>
        <div class="row justify-content-center mx-0 mb-3">
            <button class="btn btn-registro col-4" :disabled="paymentselected===null" @click.prevent="pagar">Pagar</button>
        </div>
        
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
        methods: {
            pagar() {
                if (this.paymentselected==='efectivoCollapse') {
                     const transferenciaForm = document.getElementById("transferencia");
                       /*mercadoPagoForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    mercadoPago.createToken(mercadoPagoForm, function(status, response) {
                        if (status != 200 && status != 201) {
                            const errors = document.getElementById("paymentErrors");
                            errors.textContent = response.cause[0].description;
                        } else {
                            const cardToken = document.getElementById("cardToken");
                            setCardNetwork();
                            cardToken.value = response.id;
                            setTimeout(function(){
                                mercadoPagoForm.submit();
                            },1000)
                        
                        }
                    }); 
                    });*/
                     setTimeout(function(){
                       transferenciaForm.submit();
                    },1000)
                }else if(this.paymentselected==='transferenciabancariaCollapse'){
                    const paypalForm = document.getElementById("paypal");
                
                     setTimeout(function(){
                       paypalForm.submit();
                    },1000)
                }
            }
        },
         computed: {
        ...mapState({
                cart: (state) => state.cart,
                paymentselected: (state) => state.paymentselected,
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
<style lang="scss">
    .btn-registro{
        background: #01872B;
        color:#fff;
        font-family: 'TitilliumWeb-SemiBold';
        border-radius: 8px;
        transition:ease all 0.3s;
        transform:scale(1);
    }
</style>
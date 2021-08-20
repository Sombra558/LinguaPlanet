<template>
<div>
    <div v-if="paymentmetod===null" class="btn-group btn-group-toggle row m-0 w-100 p-0" data-toggle="buttons">
        <label class="btn d-flex m-2 col-12 py-2 row m-0 justify-content-between align-items-center" @click.prevent="definir('efectivoCollapse')">
            <div>
                <input type="radio" name="payment_platform" value="efectivo" required class="position-relative">
                <span class="h5">Pagar con Stripe</span> 
            </div>
            <div>
                <img class="iz" src="/images/stripe-logo.svg">
            </div>
        </label>
        <label class="btn d-flex m-2 col-12 py-2 row m-0 justify-content-between align-items-center" @click.prevent="definir('transferenciabancariaCollapse')">
            <div>
                <input type="radio" name="payment_platform" value="transferencia" required class="position-relative">
            <span class="h5">Paypal</span>      
            </div>
            <div>
                <img class="iz" src="/images/paypal-logo.svg">
            </div>            
        </label>                                    
    </div>
    <div v-else>
        <div class="d-flex flex-column align-items-center">
            <img v-if="paymentmetod==='efectivoCollapse'" class="iz-lg" src="/images/stripe-logo.svg">
            <img v-else-if="paymentmetod==='transferenciabancariaCollapse'" class="iz-lg" src="/images/paypal-logo.svg">
            <div class="card-rounded m-2 w-100 py-3 d-flex justify-content-between align-items-center">
                <span>Metodo de pago agregado</span>
                <button class="btn btn-success btn-registro" @click.prevent="cambiar()">Seleccionar otro pago</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name:"payment-check-selected",
        data() {
            return {
                paymentmetod: null,
            }
        },
        methods: {
            definir(id) {
                this.paymentmetod=id;
                this.$store.commit("setPayment",  id);
                 $("#"+id).collapse("show");
            },
            cambiar(){
                $("#"+this.paymentmetod).collapse("hide");
                 this.$store.commit("setPayment",  null);
                this.paymentmetod=null;
            }
        },
    }
</script>

<style lang="scss" scoped>
    .btn-registro{
        transition:ease all 0.3s;
        transform:scale(1);
    }

    input[type="radio"] {
        border: 0.1em solid red;
        box-sizing: border-box;
    }

    .iz {
        width: 80px;
        height: 38px;
    }

    .iz-lg {
        width: 115px;
        height: 50px;
    }
</style>
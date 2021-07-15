<template>
<div>
     <div v-if="paymentmetod===null" class="btn-group btn-group-toggle row m-0 w-100 p-0" data-toggle="buttons">
                                            <label class="btn d-flex m-2 col-12 py-3 row m-0 justify-content-between align-items-center" style="font-family: 'TitilliumWeb-SemiBold'; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;" @click.prevent="definir('efectivoCollapse')">
                                                   <span>Transferencia Bancaria</span> 
                                                    <input
                                                        type="radio"
                                                        name="payment_platform"
                                                        value="efectivo"
                                                        required
                                                        class="position-relative"
                                                    >
                                            </label>
                                            <label class="btn d-flex m-2 col-12 py-3 row m-0 justify-content-between align-items-center" style="font-family: 'TitilliumWeb-SemiBold'; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;"  @click.prevent="definir('transferenciabancariaCollapse')" >
                                              <span>Paypal</span>  
                                                <input
                                                    type="radio"
                                                    name="payment_platform"
                                                    value="transferencia"
                                                    required
                                                    class="position-relative"
                                                >
                                            </label>
                                            <label class="btn d-flex m-2 col-12 py-3 row m-0 justify-content-between align-items-center" style="font-family: 'TitilliumWeb-SemiBold'; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;" @click.prevent="definir('paypalCollapse')">
                                              <span>ATHMÓVIL</span>  
                                                <input
                                                    type="radio"
                                                    name="payment_platform"
                                                    value="paypal"
                                                    required
                                                    class="position-relative"
                                                >
                                            </label>
        </div>
        <div v-else>
            <div v-if="paymentmetod==='efectivoCollapse'" class="row m-0">
                    <div class="m-2 w-100 py-3 row justify-content-between align-items-center" style="font-family: 'TitilliumWeb-SemiBold'; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;">
                            <p class="m-0" style="padding-left:15px;">Metodo de pago agregado</p>
                            <button class="btn btn-registro" style="margin-right:15px;" @click.prevent="cambiar()">Cambiar</button>
                        </div>
                        <div class="m-2 py-3 row justify-content-between align-items-center w-100" style="font-family: 'TitilliumWeb-SemiBold'; padding:0 15px; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;">
                            <span>Transferencia</span>
                        </div>
            </div>
             <div v-if="paymentmetod==='transferenciabancariaCollapse'" class="row m-0">
                    <div class="m-2 w-100 py-3 row justify-content-between align-items-center" style="font-family: 'TitilliumWeb-SemiBold'; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;">
                            <p class="m-0" style="padding-left:15px;">Metodo de pago agregado</p>
                            <button class="btn btn-registro" style="margin-right:15px;" @click.prevent="cambiar()">Cambiar</button>
                        </div>
                        <div class="m-2 py-3 row justify-content-between align-items-center w-100" style="font-family: 'TitilliumWeb-SemiBold'; padding:0 15px; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;">
                            <span>Paypal</span>
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
        background: #01872B;
        color:#fff;
        font-family: 'TitilliumWeb-SemiBold';
        border-radius: 8px;
        transition:ease all 0.3s;
        transform:scale(1);
    }
</style>
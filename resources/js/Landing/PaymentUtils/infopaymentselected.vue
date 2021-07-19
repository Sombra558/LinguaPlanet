<template>
    <div class="my-3 ml-1 py-3 row justify-content-between align-items-center w-100" style="font-family: 'TitilliumWeb-SemiBold'; padding:0 15px; background: #FFFEF9; box-shadow: 0px 1px 9px rgba(0, 0, 0, 0.15); border-radius: 12px;">
        <div v-if="paymentselected">
            <div v-if="paymentselected==='efectivoCollapse'">
                <div>
                    <div v-if="bancos.length>0">
                        <p style="font-family: 'TitilliumWeb-SemiBold'; color:#01872B;" class="pb-2 border-bottom: 1px solid rgba(107, 108, 107, 0.3);">Datos bancarios</p>
                        <div>
                            <div class="row m-0 flex-column">
                                <strong style="font-family: 'TitilliumWeb-SemiBold'; color:#6B6C6B;">Bancos:</strong>
                                <p class="m-0">{{bancos[0].banco}}</p>
                            </div>
                            <div class="row m-0 flex-column">
                                <strong style="font-family: 'TitilliumWeb-SemiBold'; color:#6B6C6B;">Identificación Tirular: </strong>
                                <p class="m-0">{{bancos[0].titular}}</p>
                            </div>

                             <div class="row m-0 flex-column">
                                <strong style="font-family: 'TitilliumWeb-SemiBold'; color:#6B6C6B;">Tipo de cuenta: </strong>
                                <p class="m-0">{{bancos[0].tipo}}</p>
                             </div>
                            <div class="row m-0 flex-column">
                                <strong style="font-family: 'TitilliumWeb-SemiBold'; color:#6B6C6B;">Numero de Cuenta: </strong>
                                <p class="m-0">{{bancos[0].numero_de_cuenta}}</p>
                            </div>   
                            <div class="row m-0 flex-column">
                                <strong style="font-family: 'TitilliumWeb-SemiBold'; color:#6B6C6B;">Email: </strong>
                                <p class="m-0"></p>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        No hay bancos
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            Seleccione Metodo de Pago
        </div>
    </div>
    
</template>

<script>
import { mapState } from "vuex";
    export default {
        name:"infopayment-selected",
        props:["bancos"],
         computed: {
        ...mapState({
                paymentselected: (state) => state.paymentselected,
        }),
    }
    }
</script>

<style lang="scss" scoped>

</style>
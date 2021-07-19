<template>
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
            <div class="d-flex">
                <div class="text-center">
                    <img class="mx-1 mb-2 iz-35 active" :src="`/storage/images/ellipse-${process >= 33.3 ? 'filled' : 'outlined'}.svg`">
                    <span class="h6 d-block">Seleccione el curso</span>
                </div>
                <div>
                    <img class="line1" :src="`/storage/images/line.svg`">
                </div>
                <div class="text-center">
                    <img class="mx-1 mb-2 iz-35 active" :src="`/storage/images/ellipse-${process >= 66.6 ? 'filled' : 'outlined'}.svg`">
                    <span class="h6 d-block">Seleccione el tipo de pago</span>
                </div>
                <div>
                    <img class="line2" :src="`/storage/images/line.svg`">
                </div>
                <div class="text-center">
                    <img class="mx-1 mb-2 iz-35 active" :src="`/storage/images/ellipse-${process === 100 ? 'filled' : 'outlined'}.svg`">
                    <span class="h6 d-block">Confirma tu pago</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";
    export default {
        name:"process-component",
        props:['accion'],
        computed: {
            ...mapState({
                    paymentselected: (state) => state.paymentselected,
            }),
            process(){
                var process=33.3;
                if (this.accion==='completado') {
                    process = 100;
                    return process;
                }else{
                    if (this.paymentselected) {
                        process = 66.6;
                        return process;
                    }else{
                        return process;
                    }
                }            
            }
        }
    }
</script>

<style lang="scss" scoped>
    .line1 {
        position: relative;
        left : -16px;
        top: 8px;
        width: 220%;
    }

    .line2 {
        position: relative;
        left : -31px;
        top: 8px;
        width: 220%;
    }
</style>
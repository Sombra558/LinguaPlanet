<template>
    <div>
        {{process}}
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

</style>
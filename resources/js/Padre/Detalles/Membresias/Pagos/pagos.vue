<template>
    <div class="col-12">
        <PagoCard v-for="pago in pagos" :key="pago.id" :pago="pago"/>
    </div>
</template>

<script>
import PagoCard from './pagosCard';
    export default {
        name:"pagos-component",
        props:['pagos'],
        components: {
            PagoCard,
        },
    }
</script>

<style lang="scss" scoped>

</style>
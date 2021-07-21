<template>
    <div>
        <div v-for="pago in pagos" :key="pago.id">
            <PagoCard :pago="pago" />
        </div>
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
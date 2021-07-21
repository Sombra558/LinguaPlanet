<template>
    <div>
        <buttom @click.prevent="seleccionar('membresias')">Membresías activas</buttom>
        <buttom @click.prevent="seleccionar('pagos')">Historial de pagos</buttom>
        <Membresias v-if="tabselected==='membresias'" :membresias="user.planes"/>
        <Pagos v-if="tabselected==='pagos'" :pagos="user.planes"/>
    </div>
</template>

<script>
import Membresias from './Activas/activas';
import Pagos from './Pagos/pagos';
    export default {
        name:"pagos-component",
        props:['user'],
        components: {
            Membresias,Pagos,
        },
        data() {
            return {
                tabselected:'membresias',
            }
        },
        methods: {
            seleccionar(value) {
                this.tabselected=value;
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
<template>
    <span class="form-control input-primary input-search">
        <input v-if="accion==='usuarios'" type="text" v-model="query" class="border-0 w-100" placeholder="Buscar"> 
        <input v-else-if="accion==='perfiles'" type="text" v-model="query2" class="border-0 w-100" placeholder="Buscar"> 
        <input v-else-if="accion==='ventas'" type="text" v-model="query3" class="border-0 w-100" placeholder="Buscar"> 
        <input v-else type="text" v-model="query2" class="border-0 w-100" placeholder="Buscar"> 
    </span>
</template>

<script>
    export default {
        name:'membresia-search',
        props:['accion'],
        computed: {
            query: {
                get() {
                    return this.$store.state.filterUsuarios.query;
                },
                set(value) {
                    this.$store.commit("setfilterUsuarios", {
                    filter: "query",
                    value,
                    });
                },
            },
             query2: {
                get() {
                    return this.$store.state.filterPerfiles.query;
                },
                set(value) {
                    this.$store.commit("setfilterPerfiles", {
                    filter: "query",
                    value,
                    });
                },
            },
             query3: {
                get() {
                    return this.$store.state.filterVentas.query;
                },
                set(value) {
                    this.$store.commit("setfilterVentas", {
                    filter: "query",
                    value,
                    });
                },
            },
        },
    }
</script>
<style lang="scss" scoped>

</style>
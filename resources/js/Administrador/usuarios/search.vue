<template>
    <span class="form-control input-primary input-search">
        <input v-if="accion==='usuarios'" type="text" v-model="query" class="border-0 w-100" placeholder="Buscar usuario"> 
        <input v-else type="text" v-model="query2" class="border-0 w-100" placeholder="Buscar inscripción"> 
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
                    return this.$store.state.filterInscripciones.query;
                },
                set(value) {
                    this.$store.commit("setfilterinscripciones", {
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
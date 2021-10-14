<template>
     <div >
             <input v-if="accion==='usuarios'" type="text" v-model="query" placeholder="Buscar Usuario"> 
             <input v-else type="text" v-model="query2" placeholder="Buscar inscripcion"> 
    </div>
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
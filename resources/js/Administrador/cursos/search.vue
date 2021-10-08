<template>
     <div >
             <input type="text" v-model="query" placeholder="Buscar"> 
    </div>
</template>

<script>
    export default {
        name:'cursos-search',
        computed: {
            query: {
                get() {
                    return this.$store.state.filterCursos.curso;
                },
                set(value) {
                    this.$store.commit("setfilterCursos", {
                    filter: "curso",
                    value,
                    });
                },
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>
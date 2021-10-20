<template>
    <span class="form-control input-primary input-search">
        <input type="text" v-model="query" class="border-0 w-100" placeholder="Buscar"> 
    </span>
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
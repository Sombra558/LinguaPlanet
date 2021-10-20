<template>
    <span >
        <input class="form-control input-primary input-search border-0 w-100" type="text" v-model="query" placeholder="Buscar"> 
    </span>
</template>

<script>
import { mapGetters } from "vuex";
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
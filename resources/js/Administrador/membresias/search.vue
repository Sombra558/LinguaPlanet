<template>
    <span class="form-control input-primary input-search">
        <input type="text" v-model="query" class="border-0 w-100" placeholder="Buscar"> 
    </span>
</template>

<script>
    export default {
        name:'membresia-search',
        computed: {
            query: {
                get() {
                    return this.$store.state.filterMembresias.nombre;
                },
                set(value) {
                    this.$store.commit("setfilterMembresias", {
                    filter: "nombre",
                    value,
                    });
                },
            },
        },
    }
</script>

<style lang="scss" scoped>
    
</style>
<template>
     <div >
             <input type="text" v-model="query" placeholder="Buscar"> 
    </div>
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
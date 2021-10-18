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
    .input-search {
        padding-left : 45px;
    }

    .input-search input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #31348B;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
    }

    .input-search:before {
        content: "";
        background-image: url('/images/search-icon.svg');
        background-repeat : no-repeat;
        background-position-y : center;
        position: absolute;
        top: 0;
        left: 27px;
        height: 100%;
        width: 100%;
    }
</style>
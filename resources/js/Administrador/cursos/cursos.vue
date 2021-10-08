<template>
    <div>
            <h1>Cursos</h1>
            <Searh />
            <a href="/admin/curso/create">Nuevo Curso</a>
              <table style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Nombre del Curso</th>
                        <th>Creado</th>
                        <th>Estado</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(curso,index) in filteredCursos" :key="index">
                    <td>{{curso.titulo}}</td>
                    <td>definir</td>
                    <td>definir</td>
                   
                </tr>
                </tbody>
            </table>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Searh from './search.vue';
    export default {
        name:'admin-cursos',
        props:['cursos'],
        components: {
            Searh,
        },
        computed: {
         ...mapGetters(["filteredCursos"]),
        },
        mounted () {
            if (this.cursos.length>0) {
                this.$store.commit("setCursos", this.cursos);
            };
        },

    }
</script>

<style lang="scss" scoped>

</style>
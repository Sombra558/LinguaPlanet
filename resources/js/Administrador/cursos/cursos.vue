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
                        <th>Accion</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(curso,index) in filteredCursos" :key="index">
                    <td>{{curso.titulo}}</td>
                    <td>definir</td>
                    <td>{{curso.destacados===1 ? 'Borrador' : 'Publicado'}}</td>
                    <td>
                        <a :href="`/admin/curso/${curso.id}/edit`">Editar</a>
                        <button @click.prevent="eliminarCurso(curso)">Eliminar</button>
                    </td>
                   
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
        data() {
            return {
                proceso: false
            }
        },
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
        methods: {
            eliminarCurso(curso) {
                this.proceso=true;
                var url = '/admin/curso/'+curso.id;
                axios.delete(url).then((result) => {
                  window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            }
        },

    }
</script>

<style lang="scss" scoped>

</style>
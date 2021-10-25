<template>
    <div class="container">
        <h3 class="color-black">Reporte de alumnos</h3>

        <div>
            {{perfiles.length}}
            <p>Alumnos registrados</p>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                  <Searh accion="perfiles"/>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-md-end mt-3 mt-lg-0">
                <select v-model="cursoSelected">
                    <option :value="null">Todos los cursos</option>
                    <option :value="curso.id" v-for="curso in cursos" :key="curso.id">{{curso.titulo}}</option>
                </select>
               <a href="#">Exportar</a>
            </div>
        </div>
        <table class="table mt-2 table-admin table-borderless table-striped table-com">
                        <thead>
                            <tr class="color-black">
                                <th>Nombre</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="color-black" v-for="(usuario,index) in filteredPerfiles" :key="index">
                                <td>{{usuario.apodo}}</td>
                              
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
        props:['perfiles','cursos'],
        data() {
            return {
                proceso: false,
                query: "",
            }
        },
        computed: {
         ...mapGetters(["filteredPerfiles"]),
          cursoSelected: {
                get() {
                    return this.$store.state.filterPerfiles.curso_id;
                },
                set(value) {
                    this.$store.commit("setfilterPerfiles", {
                    filter: "curso_id",
                    value,
                    });
                },
            },
        },
         components: {
            Searh,
        },
        mounted () {
            if (this.perfiles.length>0) {
                this.$store.commit("setPerfiles", this.perfiles);
            };
       
        },
        methods: {
        
        },

    }
</script>

<style lang="scss" scoped>

</style>
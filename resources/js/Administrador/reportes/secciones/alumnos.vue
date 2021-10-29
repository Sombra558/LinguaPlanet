<template>
    <div class="container">
        <div class="row mb-0 mb-lg-4">
            <div class="col-12">
                <h3 class="color-black mb-4">Reporte de alumnos</h3>
                <div class="col-12 col-lg-4 resumen-stats p-4">
                    <div class="row">
                        <div class="col-12 mb-3 mb-md-0 py-3 py-md-0 estadistica text-center">
                            <h1>{{perfiles.length}}</h1>
                            <span class="color-plomo">Alumnos registrados</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <Searh accion="perfiles"/>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column flex-lg-row justify-content-center justify-content-md-end mt-3 mt-lg-0">
                <select class="form-input select-search input-primary col-lg-5 mr-2" v-model="cursoSelected">
                    <option :value="null">Todos los cursos</option>
                    <option :value="curso.id" v-for="curso in cursos" :key="curso.id">{{curso.titulo}}</option>
                </select>
                <a class="btn btn-admin btn-outline-primary mt-3 mt-lg-0" href="#">
                    <span class="fw-500">Exportar</span>
                </a>
            </div>
        </div>
        <div class="table-container">
            <table class="table mt-4 table-admin table-borderless table-striped table-com">
                <thead>
                    <tr class="color-black">
                        <th>Nombre</th>
                        <th>Nombre del Padre</th>
                        <th>Fecha de nacimiento</th>
                        <th>hobby</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-black" v-for="(usuario,index) in filteredPerfiles" :key="index">
                        <td>{{usuario.apodo}}</td>
                        <td>{{usuario.padre.name}} {{usuario.padre.lastname}}</td>
                        <td>{{usuario.f_nacimiento}}</td>
                        <td>{{usuario.hobby}}</td>
                    </tr>
                </tbody>
            </table>
        </div>         
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
    .resumen-stats {
        background-color: transparent;
        // background-color: green;
    }

    .resumen-stats .estadistica {
        background-color: #F8F8F8;
    }

    .resumen-stats h1 {
        font-weight: 500;
    }

    @media(min-width: 768px) {
        .resumen-stats {
            background-color: #F8F8F8;
            // background-color: green;
        }

        .resumen-stats .estadistica {
            background-color: transparent;
        }
    }
</style>
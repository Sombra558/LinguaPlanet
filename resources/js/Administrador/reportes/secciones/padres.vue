<template>
    <div class="container">
        <h3 class="color-black mb-4">Reporte de padres</h3>
        <div class="row">
            <div class="col-12 col-lg-6">
                  <Searh accion="usuarios"/>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-md-end mt-3 mt-lg-0">
               <a href="#" class="btn btn-sm btn-outline-primary d-flex justify-content-center align-items-center">
                    <span class="fw-500">Exportar</span>
                </a>
            </div>
        </div>
        <div class="table-container">
            <table class="table mt-4 table-admin table-borderless table-striped table-com">
                <thead>
                    <tr class="color-black">
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="text-center">Perfiles asociados</th>                  
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-black" v-for="(usuario,index) in filteredUsuarios" :key="index">
                        <td>{{usuario.name}} {{usuario.lastname}}</td>
                        <td>{{usuario.email}}</td>
                        <td class="text-center">{{usuario.perfiles.length}}</td>
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
        props:['usuarios'],
        data() {
            return {
                proceso: false,
                query: "",

            
            }
        },
        computed: {
         ...mapGetters(["filteredUsuarios"]),
        },
         components: {
            Searh,
        },
        mounted () {
            if (this.usuarios.length>0) {
                this.$store.commit("setUsuarios", this.usuarios);
            };
       
        },
        methods: {
        
        },

    }
</script>

<style lang="scss" scoped>

</style>
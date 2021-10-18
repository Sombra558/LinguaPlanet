<template>
    <div class="container">
        <h3 class="color-black">Cursos</h3>
        <div class="row">
            <div class="col-12 col-lg-6">
                <Searh/>    
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-md-end mt-3 mt-lg-0">
                <a href="/admin/curso/create" class="btn btn-primary px-4">Crear nuevo curso</a>
            </div>
        </div>
        <div class="table-container">
            <table style="margin-top:25px," class="table table-borderless table-striped table-com">
                <thead>
                    <tr class="color-black">
                        <th>Nombre del Curso</th>
                        <th>Precio</th>
                        <!--<th>Creado</th>-->
                        <th>Estado</th>
                        <th></th>             
                    </tr>
                </thead>
                <tbody>
                <tr v-for="(curso,index) in filteredCursos" :key="index" class="color-black">
                    <td>{{curso.titulo}}</td>
                    <td>USD</td>
                    <!--<td>definir</td>-->
                    <td>{{curso.destacados===1 ? 'Borrador' : 'Publicado'}}</td>
                    <td style="position:relative;">
                        <button type="button" class="btn-options" @click="showOptions($event, index)">
                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="2" cy="2" r="2" fill="#606060"/>
                                <circle cx="9" cy="2" r="2" fill="#606060"/>
                                <circle cx="16" cy="2" r="2" fill="#606060"/>
                            </svg>
                        </button>
                        <div :id="`options${index}`" class="popover d-none" role="tooltip" style="width: 12rem; position: absolute;top: 48px;left: -9.3rem;">
                            <div class="arrow"></div>
                            <h3 class="popover-header"></h3>
                            <div class="popover-body px-4">
                                <div class="row py-2">
                                    <div class="col">
                                        <a :href="`/admin/curso/${curso.id}`" class="color-black">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="ml-1">
                                                Ver Detalle
                                            </span>
                                        </a>        
                                    </div>                                
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <a :href="`/admin/curso/${curso.id}/edit`" class="color-black">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="ml-1">
                                                Editar
                                            </span>
                                        </a>        
                                    </div>                                
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <a @click.prevent="eliminarCurso(curso)" href="#" class="color-black">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 6H5H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10 11V17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14 11V17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="ml-1">
                                                Eliminar
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <a href="#" class="color-black">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.5 11C10.7091 11 12.5 9.20914 12.5 7C12.5 4.79086 10.7091 3 8.5 3C6.29086 3 4.5 4.79086 4.5 7C4.5 9.20914 6.29086 11 8.5 11Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M20 8V14" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M23 11H17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="ml-1">
                                                Inscribir Usuarios
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
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
            $(document).ready(function(){
              $('[data-toggle="popover"]').popover();
            });
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
            },
            showOptions(element, index) {
                document.querySelector(`.popover.d-block:not(#options${index})`)?.classList.replace('d-block', 'd-none')
                $(`#options${index}`).toggleClass('d-block');
                $(`#options${index}`).toggleClass('d-none');
            }
        },
    }
</script>

<style lang="scss" scoped>
    .btn {
        font-weight : 400;
    }

    .btn-options {
        background-color: transparent;
        border: none;
    }

    .btn-options:hover {
        border: 1px solid #606060;
        box-sizing: border-box;
        border-radius: 4px;
    }

    table thead th {        
        font-weight: 500;
        font-size: 1rem;
    }

    .table-container {
        width : 100%;
        height: 100%;
        min-height: calc(100vh - 100px);
        overflow-x : auto;
    }

    .table {
        width : 74.3em;
    }

    @media(max-width: 768px) {
        .btn.btn-primary {
            display: block;
            width: 100%;
        }
    }
</style>
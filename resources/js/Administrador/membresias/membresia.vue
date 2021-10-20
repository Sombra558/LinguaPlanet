<template>
    <div class="container">
        <h3 class="color-black">Membresias</h3>
        <div class="row">
            <div class="col-12 col-lg-6">
                <Searh/>    
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-md-end mt-3 mt-lg-0">
                <a class="btn btn-admin btn-primary px-4" @click.prevent="membresiamodal(null,'crear')">Crear nueva membresia</a>
            </div>
        </div>
        <div class="table-container"> 
            <table style="margin-top:25px" class="table table-admin table-borderless table-striped table-com">
                <thead>
                    <tr class="color-black">
                        <th>Membresia</th>
                        <th>Idioma</th>
                        <th>Fecha de Creación</th>
                        <th></th>                 
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-black" v-for="(membresia,index) in filteredMembresias" :key="index">
                        <td>{{membresia.nombre}}</td>
                        <td>{{membresia.idioma.idioma}}</td>
                        <td>{{membresia.created_at}}</td>
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
                                            <a @click.prevent="membresiamodal(membresia,'editar')" href="#" class="color-black">
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
                                            <a @click.prevent="eliminarMembresia(membresia)" href="#" class="color-black">
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
                                </div>
                            </div>
                        </td>                   
                    </tr>
                </tbody>
            </table>
        </div>
        <!--modal crear-->
        <div class="modal fade" id="crearMembresia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-admin pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form id="crear-cupon" @submit.prevent="crearMembresia()" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Crear nueva membresia</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="nombre">Nombre de la membresia</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="newmembresia.nombre" maxlength="200" placeholder="Ingresa el nombre" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="tipo_cupon" >idioma</label>
                                    <select class="form-input form-input-admin input-primary" name="idioma_id"  v-model="newmembresia.idioma_id" required>
                                        <option :value="null">Seleccionar</option>
                                        <option v-for="idioma in idiomas" :key="idioma.id" :value="idioma.id">{{idioma.idioma}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="titulo" >Nombre URL</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="nombreURL" name="nombreURL" placeholder="Ingresa el nombre URL" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-admin btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-admin btn-lg btn-primary">Agregar Membresia</button>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
          <!--modal editar-->
         <div v-if="membresiaSelected" class="modal fade" id="editarMembresia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header moda-heacer-admin pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form id="editar-cupon" @submit.prevent="editarMembresia(membresiaSelected)" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Editar Membresia</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="membresiaSelected.nombre" maxlength="200" required> 
                                </div>    
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="tipo_cupon" >idioma</label>
                                    <select class="form-input form-input-admin input-primary" name="tipo_cupon"  v-model="membresiaSelected.idioma_id" required>
                                        <option :value="null">Seleccione</option>
                                        <option v-for="idioma in idiomas" :key="idioma.id" :value="idioma.id">{{idioma.idioma}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="titulo" >Nombre URL</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="membresiaSelected.nombreURL" name="nombreURL" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-admin btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-admin btn-lg btn-primary">Editar Membresia</button>
                        </div>
                    </form>          
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Searh from './search.vue';
    export default {
        name:'admin-cursos',
        props:['membresias','idiomas'],
        data() {
            return {
                proceso: false,
                membresiaSelected:null,
                newmembresia:{
                    nombre:null,
                    idioma_id:null,
                    nombreURL:null,
                }
            }
        },
        components: {
            Searh,
        },
        computed: {
         ...mapGetters(["filteredMembresias"]),
          nombreURL() {
                var tituloorigi=this.newmembresia.nombre;
                if (tituloorigi) {
                     this.newmembresia.nombreURL = tituloorigi.replace(/[ ?¿!¡/\\🔴]/g, "-")
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .toLowerCase();
                    return this.newmembresia.nombreURL;
                }else{
                    return null;
                }
               
            },
        },
        mounted () {
            if (this.membresias.length>0) {
                this.$store.commit("setMembresias", this.membresias);
            };
        },
        methods: {
            crearMembresia() {
                var url = '/admin/membresia';
                axios.post(url,this.newmembresia).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            editarMembresia(membresia) {
                var url = '/admin/membresia/'+membresia.id;
                axios.put(url,membresia).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            eliminarMembresia(membresia) {
                this.proceso=true;
                var url = '/admin/membresia/'+membresia.id;
                axios.delete(url).then((result) => {
                  window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
            membresiamodal(value,action) {
                if (action==='crear') {
                    $("#crearMembresia").modal("show");
                }else{
                    this.membresiaSelected=value;
                     setTimeout(function(){
                        $("#editarMembresia").modal("show");
                    },200)
                    
                }
            },
            showOptions(element, index) {
                document.querySelector(`.popover.d-block:not(#options${index})`)?.classList.replace('d-block', 'd-none')
                $(`#options${index}`).toggleClass('d-block');
                $(`#options${index}`).toggleClass('d-none');
            }
        }
    }
</script>

<style lang="scss" scoped>
    
</style>
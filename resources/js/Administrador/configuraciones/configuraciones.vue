<template>
    <div class="container">
        <h3 class="color-black">Configuraciones</h3>     
        <h4 class="color-plomo">Membresias</h4>
        <div class="accordion" id="accordionExample">
            <div class="card" v-for="(membresia, index) in filteredMembresias" :key="membresia.id">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" :data-target="`#collapse${index}`" aria-expanded="true" :aria-controls="`collapse${index}`">
                        <h4>Membresia: {{membresia.nombre}}</h4>
                        <p v-for="idioma in membresia.idiomas" :key="idioma.id">Idioma: {{idioma.idioma}}</p>
                    </button>
                </div>
                <div :id="`collapse${index}`" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body pb-0 pt-2 d-flex justify-content-end">
                        <button class="btn btn-admin btn-primary" @click.prevent="planmodal(membresia,'crear')">Agregar Plan</button>
                    </div>
                    <div class="table-container">
                    <table class="table table-admin table-borderless table-striped table-com">
                        <thead>
                            <tr class="color-black">
                                <th>Nombre </th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Perfiles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="color-black" v-for="(plan) in membresia.planes" :key="plan.id">
                                <td>{{plan.nombre}}</td>
                                <td>{{plan.tipo}}</td>
                                <td>{{plan.precio}}</td>
                                <td>{{plan.stock}}</td>
                                <td class="d-flex justify-content-center">
                                    <button class="transparent-button" @click.prevent="planmodal(plan,'editar')">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-1">
                                            Editar
                                        </span>
                                    </button>
                                    <button class="transparent-button" @click.prevent="eliminarPlan(plan)">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 11V17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14 11V17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-1">
                                            Eliminar
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <!--modal crear-->
        <div class="modal fade" id="crearPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-admin pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form id="crear-cupon" @submit.prevent="crearPlan()" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Nuevo plan</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="newplan.nombre" maxlength="200" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="titulo" >Nombre URL</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="nombreURL" name="nombreURL" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="tipo_cupon" >Tipo de Pago</label>
                                    <select class="form-input form-input-admin input-primary" name="tipo"  v-model="newplan.tipo" required>
                                        <option :value="null">Seleccione</option>
                                        <option :value="'Mensual'">Mensual</option>
                                        <option :value="'Trimestral'">Trimestral</option>
                                        <option :value="'Anual'">Anual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="Precio">Precio</label>
                                    <input type="number" class="form-input form-input-admin input-primary input-novedades" v-model="newplan.precio" step=".01" name="precio" required>
                                </div>
                               <div class="form-group col-12 col-lg-6">
                                    <label for="Precio">Stock</label>
                                    <input type="number" class="form-input form-input-admin input-primary input-novedades" v-model="newplan.stock" step="1" name="stock" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-admin btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-admin btn-lg btn-primary">Agregar Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!--modal editar-->
        <div v-if="planSelected" class="modal fade" id="editarPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-admin pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form id="crear-cupon" @submit.prevent="editarPlan(planSelected)" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Nuevo plan</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="planSelected.nombre" maxlength="200" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="titulo" >Nombre URL</label>
                                    <input type="text" class="form-input form-input-admin input-primary" v-model="planSelected.nombreURL" name="nombreURL" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="tipo_cupon" >Tipo de Pago</label>
                                    <select class="form-input form-input-admin input-primary" name="tipo" v-model="planSelected.tipo" required>
                                        <option :value="null">Seleccione</option>
                                        <option :value="'Mensual'">Mensual</option>
                                        <option :value="'Trimestral'">Trimestral</option>
                                        <option :value="'Anual'">Anual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="Precio">Precio</label>
                                    <input type="number" class="form-input form-input-admin input-primary input-novedades" v-model="planSelected.precio" step=".01" name="precio" required>
                                </div>
                                   <div class="form-group col-12 col-lg-6">
                                    <label for="Precio">Stock</label>
                                    <input type="number" class="form-input form-input-admin input-primary input-novedades" v-model="planSelected.stock" step="1" name="stock" required>
                                </div>
                            </div> 
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-admin btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-admin btn-lg btn-primary">Editar Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

    export default {
        name:'admin-configuraciones',
        props:['membresias'],
        data() {
            return {
                proceso: false,
                membresiaSelected:null,
                planSelected:null,
                newplan:{
                    nombre:null,
                    membresia_id:null,
                    nombreURL:null,
                    precio:null,
                    stock:null,
                    tipo:null,
                }
            }
        },
        computed: {
         ...mapGetters(["filteredMembresias"]),
          nombreURL() {
                var tituloorigi=this.newplan.nombre;
                if (tituloorigi) {
                     this.newplan.nombreURL = tituloorigi.replace(/[ ?¿!¡/\\🔴]/g, "-")
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .toLowerCase();
                    return this.newplan.nombreURL;
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
            crearPlan() {
                var url = '/admin/plan';
                axios.post(url,this.newplan).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            editarPlan(plan) {
                var url = '/admin/plan/'+plan.id;
                axios.put(url,plan).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            eliminarPlan(plan) {
                this.proceso=true;
                var url = '/admin/plan/'+plan.id;
                axios.delete(url).then((result) => {
                  window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
            planmodal(value,action) {
                  this.membresiaSelected=value;
                  this.newplan.membresia_id=this.membresiaSelected.id;
                if (action==='crear') {
                    $("#crearPlan").modal("show");
                }else{
                    this.planSelected=value;
                     setTimeout(function(){
                        $("#editarPlan").modal("show");
                    },200)
                    
                }
                
               
            },
        },

    }
</script>

<style lang="scss" scoped>
    .table-admin {
        width: 73.4em;
    }
</style>
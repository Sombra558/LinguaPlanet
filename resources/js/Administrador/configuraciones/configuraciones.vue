<template>
    <div>
            <h1>Configuraciones</h1>
     
            <h3>Membresias</h3>
            <div  class="container" v-for="(membresia) in filteredMembresias" :key="membresia.id">
                 <div class="row justify-content-between">
                    <div>  
                        <h4>Membresia: {{membresia.nombre}}</h4>
                        <p>Idioma: {{membresia.idioma.idioma}}</p>
                    </div>
                    <a @click.prevent="planmodal(membresia,'crear')">Agregar Plan</a>
                 </div>
                 
                         <table  style="margin-top:25px" class="table table-com">
                        <thead>
                            <tr>
                                <th>Nombre </th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Perfiles</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="(plan) in membresia.planes" :key="plan.id">
                            <td>{{plan.nombre}}</td>
                            <td>{{plan.tipo}}</td>
                            <td>{{plan.precio}}</td>
                             <td>{{plan.stock}}</td>
                            <td>
                                <a @click.prevent="planmodal(plan,'editar')">Editar Plan</a>
                                <a @click.prevent="eliminarPlan(plan)">Eliminar</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                         <br>
                              <br>
            </div>
           
              <!--modal crear-->
             <div class="modal fade" id="crearPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="crear-cupon" @submit.prevent="crearPlan()" ref="form">
                       
                        <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre</label>
                                <input type="text" v-model="newplan.nombre" maxlength="200" required>
                              
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >Tipo de Pago</label>
                                 <select name="tipo"  v-model="newplan.tipo" required>
                                    <option :value="null">Seleccione</option>
                                    <option :value="'Mensual'">Mensual</option>
                                    <option :value="'Trimestral'">Trimestral</option>
                                    <option :value="'Anual'">Anual</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="titulo" >Nombre URL</label>
                                <input type="text" v-model="nombreURL" name="nombreURL" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3 col-12">
                            <label for="Precio">Precio</label>
                            <input type="number" v-model="newplan.precio" step=".01" name="precio" class="form-control input-novedades" required>
                        </div>
                           <div class="form-group col-md-3 col-12">
                            <label for="Precio">Stock</label>
                            <input type="number" v-model="newplan.stock" step="1" name="stock" class="form-control input-novedades" required>
                        </div>
                           
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Plan</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
             <!--modal editar-->
             <div v-if="planSelected" class="modal fade" id="editarPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="crear-cupon" @submit.prevent="editarPlan(planSelected)" ref="form">
                       
                        <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre</label>
                                <input type="text" v-model="planSelected.nombre" maxlength="200" required>
                              
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >Tipo de Pago</label>
                                 <select name="tipo"  v-model="planSelected.tipo" required>
                                    <option :value="null">Seleccione</option>
                                    <option :value="'Mensual'">Mensual</option>
                                    <option :value="'Trimestral'">Trimestral</option>
                                    <option :value="'Anual'">Anual</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="titulo" >Nombre URL</label>
                                <input type="text" v-model="planSelected.nombreURL" name="nombreURL" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3 col-12">
                            <label for="Precio">Precio</label>
                            <input type="number" v-model="planSelected.precio" step=".01" name="precio" class="form-control input-novedades" required>
                        </div>
                           <div class="form-group col-md-3 col-12">
                            <label for="Precio">Stock</label>
                            <input type="number" v-model="planSelected.stock" step="1" name="stock" class="form-control input-novedades" required>
                        </div>
                           
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Editar Plan</button>
                        </div>
                    </form>
                </div>              
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

</style>
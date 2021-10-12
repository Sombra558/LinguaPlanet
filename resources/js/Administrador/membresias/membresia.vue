<template>
    <div>
            <h1>Membresias</h1>
            <Searh />
             <a @click.prevent="membresiamodal(null,'crear')">Crear nueva membresia</a>
              <table style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Nombre </th>
                        <th>Idioma</th>
                        <th>Fecha de Creacion</th>
                        <th>Accion</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(membresia,index) in filteredMembresias" :key="index">
                    <td>{{membresia.nombre}}</td>
                    <td>{{membresia.idioma.idioma}}</td>
                    <td>{{membresia.created_at}}</td>
                    <td>
                        <a @click.prevent="membresiamodal(membresia,'editar')">Editar</a>
                        <button @click.prevent="eliminarMembresia(membresia)">Eliminar</button>
                    </td>
                   
                </tr>
                </tbody>
            </table>
              <!--modal crear-->
             <div class="modal fade" id="crearMembresia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Membresia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="crear-cupon" @submit.prevent="crearMembresia()" ref="form">
                       
                        <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre</label>
                                <input type="text" v-model="newmembresia.nombre" maxlength="200" required>
                              
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >idioma</label>
                                 <select name="idioma_id"  v-model="newmembresia.idioma_id" required>
                                    <option :value="null">Seleccione</option>
                                    <option v-for="idioma in idiomas" :key="idioma.id" :value="idioma.id">{{idioma.idioma}}</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="titulo" >Nombre URL</label>
                                <input type="text" v-model="nombreURL" name="nombreURL" class="form-control" required>
                        </div>
                         
                           
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Membresia</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
              <!--modal editar-->
             <div v-if="membresiaSelected" class="modal fade" id="editarMembresia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Membresia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editar-cupon" @submit.prevent="editarMembresia(membresiaSelected)" ref="form">
                         <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre</label>
                                <input type="text" v-model="membresiaSelected.nombre" maxlength="200" required> 
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >idioma</label>
                                 <select name="tipo_cupon"  v-model="membresiaSelected.idioma_id" required>
                                    <option :value="null">Seleccione</option>
                                    <option v-for="idioma in idiomas" :key="idioma.id" :value="idioma.id">{{idioma.idioma}}</option>
                                </select>
                        </div>
                               <div class="form-group col-md-6 col-12">
                                <label for="titulo" >Nombre URL</label>
                                <input type="text" v-model="membresiaSelected.nombreURL" name="nombreURL" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Editar Membresia</button>
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
        },

    }
</script>

<style lang="scss" scoped>

</style>
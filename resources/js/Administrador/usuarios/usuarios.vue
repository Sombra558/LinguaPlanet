<template>
    <div class="container">
        <h3 class="color-black">Usuarios</h3>
        <div class="row">
            <div class="col-12 col-lg-6">
                <Searh :accion="tab"/>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-md-end mt-3 mt-lg-0">
                <a v-if="tab==='inscripciones'" class="btn btn-admin btn-primary px-4" @click.prevent="planusermodal(null,'crear')">Inscribir Usuario a membresia</a>
             <a v-else class="btn btn-admin btn-primary px-4" @click.prevent="usermodal()">Crear Usuario</a>
            </div>
        </div>
        <nav class="mt-3">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" @click.prevent="seleccionartab('inscripciones')" id="nav-inscritos-tab" data-toggle="tab" href="#nav-inscritos" role="tab" aria-controls="nav-inscritos" aria-selected="true">Usuarios inscritos</a>
            <a class="nav-link" @click.prevent="seleccionartab('usuarios')" id="nav-usuarios-tab" data-toggle="tab" href="#nav-usuarios" role="tab" aria-controls="nav-usuarios" aria-selected="false">Todos los usuarios</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane table-container fade show active" id="nav-inscritos" role="tabpanel" aria-labelledby="nav-inscritos-tab">
                <table class="table mt-2 table-admin table-borderless table-striped table-com">
                    <thead>
                        <tr class="color-black">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Comprobante</th>
                            <th>Perfiles disponibles en plan</th>
                            <th></th>                     
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="color-black" v-for="(usuario,index) in filteredInscripciones" :key="index">
                            <td>{{usuario.user.name}}</td>
                            <td>{{usuario.user.lastname}}</td>
                            <td>{{usuario.user.email}}</td>
                            <td>{{usuario.tipo}}</td>
                            <td>{{usuario.comprobante}}</td>
                            <td>{{usuario.available}}</td>
                            <td>
                                <button class="transparent-button" @click.prevent="planusermodal(usuario,'editar')">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span class="ml-1">
                                        Editar
                                    </span>
                                </button>
                                <button class="transparent-button" @click.prevent="eliminarInscripcion(usuario)">
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
            <div class="tab-pane fade" id="nav-usuarios" role="tabpanel" aria-labelledby="nav-usuarios-tab">
                <div class="table-container">
                    <table class="table mt-2 table-admin table-borderless table-striped table-com">
                        <thead>
                            <tr class="color-black">
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="color-black" v-for="(usuario,index) in filteredUsuarios" :key="index">
                                <td>{{usuario.name}}</td>
                                <td>{{usuario.lastname}}</td>
                                <td>{{usuario.email}}</td>
                                <td>
                                    <button class="transparent-button" @click.prevent="eliminaruser(usuario.id)" >
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
        <!--modal crear Usuario-->
        <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="formu-usuario" @submit.prevent="agregar()" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Crear nuevo usuario</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12 col-lg-6">
                                    <label>Nombre de usuario</label>
                                    <input type="text" v-model="newusuario.name" name="name" class="form-input form-input-admin input-primary" placeholder="Nombre del usuario" aria-label="Cursos" aria-describedby="addon-wrapping">
                                </div>                        
                                <div class="form-group form-group-admin col-12 col-lg-6">
                                    <label>Apellido de usuario</label>
                                    <input type="text" v-model="newusuario.lastname"  name="lastname" class="form-input form-input-admin input-primary"  placeholder="Apellido del docente" aria-label="Cursos" aria-describedby="addon-wrapping">
                                </div>                        
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12 col-lg-6">
                                    <label>Email</label>
                                    <input type="text" v-model="newusuario.email" name="email" class="form-input form-input-admin input-primary "  placeholder="Correo">
                                </div>                        
                                <div class="form-group form-group-admin col-12 col-lg-6">
                                    <label>Frase Secreta</label>
                                    <input
                                        type="password"
                                        placeholder="Indroduce tu frase de acceso"
                                        name="frase"
                                        v-model="newusuario.frase"
                                        class="form-input form-input-admin input-primary "
                                    />
                                </div> 
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12 col-lg-6">
                                    <label>Contraseña</label>
                                    <input
                                        type="password"
                                        placeholder="Indroduce tu nueva Contraseña"
                                        name="password"
                                        v-model="newusuario.password"
                                        class="form-input form-input-admin input-primary "
                                    />
                                </div>            
                                <div class="form-group form-group-admin col-12 col-lg-6">
                                    <label>Confirmar Contraseña</label>
                                    <input
                                    type="password"
                                    placeholder="Confirma tu contraseña"
                                    name="password"
                                    v-model="newusuario.confirmpassword"
                                    class="form-input form-input-admin input-primary"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-admin btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-admin btn-lg btn-primary">Inscribir usuario</button>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
        <!--modal editar-->
        <div v-if="inscripcionSelected" class="modal fade" id="editarPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-admin">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form id="editar-cupon" @submit.prevent="editarInscripcion(inscripcionSelected)" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Editar inscripción</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label>Nombre de Usuario</label>
                                    <input type="text" disabled v-model="inscripcionSelected.user.name" class="form-input form-input-admin input-primary input-novedades" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Apellido de Usuario</label>
                                    <input type="text" disabled v-model="inscripcionSelected.user.lastname" class="form-input form-input-admin input-primary input-novedades" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Email de Usuario</label>
                                    <input type="text" disabled v-model="inscripcionSelected.user.email" class="form-input form-input-admin input-primary input-novedades" required>
                                </div>                                  
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Seleccione Plan</label>
                                    <select v-if="planesdisSelected" v-model="inscripcionSelected.plan_id" name="plan_id" class="form-input form-input-admin input-primary input-novedades" required>
                                        <option :value="null">Seleccione plan</option>
                                        <option :value="plan.id" v-for="plan in planesdisSelected" :key="'plan-disponibles-'+plan.id">
                                            {{plan.nombre}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-lg btn-admin btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-lg btn-admin btn-primary">Editar Inscripcion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--modal crear-->
        <div class="modal fade" id="crearPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="crear-inscripcion" @submit.prevent="crearInscripcion(userSelected,planSelected)" ref="form">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">Nueva inscripción</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Buscar alumno</label>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <input type="text" v-model="query" class="form-input form-input-admin input-primary input-novedades" style="border-radius:8px;" required>
                                        <button @click.prevent="buscar(query)" class="position-absolute mr-2 btn p-0">
                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <ellipse cx="9.50953" cy="9.85054" rx="8.50953" ry="8.85054" stroke="#041008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M15.428 16.4668L18.7642 19.9277" stroke="#041008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Seleccione estudiante</label>
                                    <select  name="user_id" v-model="userSelected" class="form-input form-input-admin input-primary input-novedades" required>
                                        <option :value="null">Seleccionar</option>
                                        <option :value="user.id" v-for="user in todosUser" :key="'user-'+user.id">
                                            {{user.name}} {{user.lastname}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Seleccione Membresia</label>
                                    <select v-model="membresiaSelected" name="curso_id" class="form-input form-input-admin input-primary input-novedades"  required>
                                        <option :value="null">Seleccionar</option>
                                        <option :value="membresia" v-for="membresia in membresias" :key="'membresia-'+membresia.id">
                                            {{membresia.nombre}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-admin col-12">
                                    <label for="inicia">Seleccione Plan</label>
                                    <select v-if="membresiaSelected" v-model="planSelected" name="plan_id" class="form-input form-input-admin input-primary input-novedades"  required>
                                        <option :value="null">Seleccionar</option>
                                        <option :value="plan.id" v-for="plan in membresiaSelected.planes" :key="'plan-'+plan.id">
                                            {{plan.nombre}}
                                        </option>
                                    </select>
                                    <select v-else v-model="planSelected" name="plan_id" class="form-input form-input-admin input-primary input-novedades"  required>
                                        <option :value="null">Seleccionar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-admin">
                            <button type="button" class="btn btn-admin btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-admin btn-lg btn-primary">Inscribir Usuario</button>
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
        props:['membresias','usuarios','inscripciones'],
        data() {
            return {
                proceso: false,
                query: "",
                tab:'inscripciones',
                inscripcionSelected:null,
                newusuario:{
                    name:null,
                    lastname:null,
                    email:null,
                    password:null,
                    confirmpassword:null,
                    frase:null,
                },
                todosUser:[],
                userSelected:null,
                membresiaSelected:null,
                planSelected:null,
                newinscripcion:{
                    user_id:null,
                    plan_id:null,
                },
                planesdisSelected:[],
            }
        },
        components: {
            Searh,
        },
        computed: {
         ...mapGetters(["filteredUsuarios"]),
         ...mapGetters(["filteredInscripciones"]),
        },
        mounted () {
            if (this.usuarios.length>0) {
                this.$store.commit("setUsuarios", this.usuarios);
            };
             if (this.inscripciones.length>0) {
                this.$store.commit("setInscripciones", this.inscripciones);
            };
        },
        methods: {
              buscar(query){
                var url="/admin/buscar-usuario/"+query;
                axios.get(url).then((result) => {
                    this.todosUser=result.data;
                }).catch((err) => {
                    console.log(err);
                });
            },
            seleccionartab(value) {
                this.tab=value;
            },
              eliminaruser(id){
                var url = '/admin/userdelete/'+id;
                axios.delete(url).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
             agregar() {
            this.proceso=true;
            if (
                this.newusuario.password == ""
              ) {
                this.proceso=false;
                  console.log('El campo "Contraseña" no puede estar vacío');
              } else if (
                this.newusuario.password !=
                this.newusuario.confirmpassword
              ) {
                this.proceso=false;
                  console.log('La confirmación de contraseña no es igual a la contraseña indicada');
              } else {
                    var validaurl = '/admin/valida-usuario/'+this.newusuario.email;
                    axios.get(validaurl).then((result) => {
                      if (result.data!="") {
                           this.proceso=false;
                        console.log('correo ya registrado');
                      } else {  
                         let form = $("#formu-usuario")[0];
                          let formulario = new FormData(form);
                          var ruta ='/admin/crear-usuario';
                              axios.post(ruta, formulario)
                                  .then((res) => {
                                      window.location.reload();
                                  })
                                  .catch((err) => {
                                      this.proceso=false;
                                      console.log(err);
                          });
                      }
                    }).catch((err) => {
                      console.log(err)
                    });
                   
              } 
         },
            crearInscripcion(user,plan) {
                var url = '/admin/plan-user';
                this.newinscripcion.user_id=user,
                this.newinscripcion.plan_id=plan,
                axios.post(url,this.newinscripcion).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            editarInscripcion(plan_user) {
                var url = '/admin/plan-user/'+plan_user.id;
                axios.put(url,plan_user).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            eliminarInscripcion(membresia) {
                this.proceso=true;
                var url = '/admin/plan-user/'+membresia.id;
                axios.delete(url).then((result) => {
                  window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
            planusermodal(value,action) {
                if (action==='crear') {
                    $("#crearPlan").modal("show");
                }else{
                    this.planesdisSelected=[],
                    this.inscripcionSelected=value;

                    this.membresias.forEach(element => {
                        if (element.id === value.plan.membresia_id ) {
                          
                            this.planesdisSelected=element.planes;
                        }
                    });
                     setTimeout(function(){
                        $("#editarPlan").modal("show");
                    },200)
                    
                }
                
               
            },
            usermodal(value,action) {
                $("#crearUsuario").modal("show");
            },
        },

    }
</script>

<style lang="scss" scoped>

</style>
<template>
    <div>
            <h1>Usuarios</h1>
            <Searh :accion="tab" />
             <a v-if="tab==='inscripciones'" @click.prevent="planusermodal(null,'crear')">Inscribir Usuario a membresia</a>
              <a v-else @click.prevent="usermodal()">Crear Usuario</a>

            <div class="row">
                    <button @click.prevent="seleccionartab('inscripciones')" class="col-sm-12 col-md-3">
                        Usuarios Inscritos
                    </button>
                    <button @click.prevent="seleccionartab('usuarios')" class="col-sm-12 col-md-3">
                        Todos los Usuarios
                    </button>
                   
        </div>
              <table v-if="tab==='usuarios'" style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Lastname</th>
                        <th>Accion</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(usuario,index) in filteredUsuarios" :key="index">
                    <td>{{usuario.name}}</td>
                    <td>{{usuario.lastname}}</td>
                    <td>{{usuario.email}}</td>
                    <td>
                        <a @click.prevent="eliminaruser(usuario.id)">Eliminar</a>

                    </td>
                   
                </tr>
                </tbody>
            </table>
              <table v-if="tab==='inscripciones'" style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Lastname</th>
                        <th>Tipo</th>
                        <th>Comprobante</th>
                        <th>Perfiles Disponibles En Plan</th>
                        <th>Accion</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(usuario,index) in filteredInscripciones" :key="index">
                    <td>{{usuario.user.name}}</td>
                    <td>{{usuario.user.lastname}}</td>
                    <td>{{usuario.user.email}}</td>
                    <td>{{usuario.tipo}}</td>
                    <td>{{usuario.comprobante}}</td>
                    <td>{{usuario.available}}</td>
                    <td>
                        <a @click.prevent="planusermodal(usuario,'editar')">Editar</a>
                         <a @click.prevent="eliminarInscripcion(usuario)">Eliminar</a>
      
                    </td>
                   
                </tr>
                </tbody>
            </table>

                <!--modal crear Usuario-->
             <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formu-usuario" @submit.prevent="agregar()" ref="form">
                       
                       <div class="row m-0">
                                        <div class="col-6">
                                            <input  type="text" v-model="newusuario.name" name="name" class="form-control" placeholder="Nombre del usuario" aria-label="Cursos" aria-describedby="addon-wrapping">
                                        </div>
                                        
                                        <div class="col-6">
                                            <input type="text" v-model="newusuario.lastname"  name="lastname" class="form-control"  placeholder="Apellido del docente" aria-label="Cursos" aria-describedby="addon-wrapping">
                                        </div>
                                        
                                        <div class="col-6">
                                            <input type="text" v-model="newusuario.email" name="email" class="form-control "  placeholder="Correo">
                                        </div>
                                        
                                  </div>
                                   
                                  
                                         <div class="col-md-12 mt-3 mb-1">
                                        <label>Frase Secreta</label>
                                        <input
                                            type="password"
                                            placeholder="Indroduce tu frase de acceso"
                                            name="frase"
                                            v-model="newusuario.frase"
                                            class="form-control "
                                        />
                                    </div> 
                                    <div class="col-md-12 mt-3 mb-1">
                                        <label>Contraseña</label>
                                        <input
                                            type="password"
                                            placeholder="Indroduce tu nueva Contraseña"
                                            name="password"
                                            v-model="newusuario.password"
                                            class="form-control "
                                        />
                                    </div>            
                                    <div class="col-md-12 mt-3 mb-2">
                                                <label>Confirmar Contraseña</label>
                                                <input
                                                type="password"
                                                placeholder="Confirma tu contraseña"
                                                name="password"
                                                v-model="newusuario.confirmpassword"
                                                class="form-control"
                                                />
                                    </div>
                            
                         
                           
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Inscribir Usuario</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
              <!--modal editar-->
             <div v-if="inscripcionSelected" class="modal fade" id="editarPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Inscripcion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editar-cupon" @submit.prevent="editarInscripcion(inscripcionSelected)" ref="form">
                            <div class="form-group">
                                        <label for="inicia">Nombre de Usuario</label>
                                        <div class="row mx-0 align-items-center justify-content-end mb-3 ">
                                            <input type="text" disabled v-model="inscripcionSelected.user.name" class="form-control input-novedades" style="border-radius:8px;" required>
                                        </div>
                             </div>
                              <div class="form-group">
                                        <label for="inicia">Apellido de Usuario</label>
                                        <div class="row mx-0 align-items-center justify-content-end mb-3 ">
                                            <input type="text" disabled v-model="inscripcionSelected.user.lastname" class="form-control input-novedades" style="border-radius:8px;" required>
                                        </div>
                             </div>
                                <div class="form-group">
                                        <label for="inicia">Email de Usuario</label>
                                        <div class="row mx-0 align-items-center justify-content-end mb-3 ">
                                            <input type="text" disabled v-model="inscripcionSelected.user.email" class="form-control input-novedades" style="border-radius:8px;" required>
                                        </div>
                             </div>
                                  
                            <div class="form-group">
                                  
                                        <label for="inicia">Seleccione Plan</label>
                                        <select v-if="planesdisSelected" v-model="inscripcionSelected.plan_id" name="plan_id" class="form-control input-novedades"  required>
                                                    <option :value="null">Seleccione plan</option>
                                                    <option :value="plan.id" v-for="plan in planesdisSelected" :key="'plan-disponibles-'+plan.id">
                                                        {{plan.nombre}}
                                                    </option>
                                         </select>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Editar Inscripcion</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
              <!--modal crear-->
             <div class="modal fade" id="crearPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Inscripcion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="crear-inscripcion" @submit.prevent="crearInscripcion(userSelected,planSelected)" ref="form">
                       
                             <div class="form-group">
                                        <label for="inicia">Buscar alumno</label>

                                        <div class="row mx-0 align-items-center justify-content-end mb-3 ">
                                            <input type="text" v-model="query" class="form-control input-novedades" style="border-radius:8px;" required>
                                            <button @click.prevent="buscar(query)" class="position-absolute mr-2 btn p-0">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse cx="9.50953" cy="9.85054" rx="8.50953" ry="8.85054" stroke="#041008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.428 16.4668L18.7642 19.9277" stroke="#041008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                             </div>
                                  
                            <div class="form-group">
                                        <label for="inicia">Seleccione estudiante</label>
                                        <select  name="user_id" v-model="userSelected" class="form-control input-novedades" required>
                                                <option :value="null">Seleccione Usuario</option>
                                                <option :value="user.id" v-for="user in todosUser" :key="'user-'+user.id">
                                                    {{user.name}} {{user.lastname}}
                                                </option>
                                        </select>
                                        <label for="inicia">Seleccione Membresia</label>
                                        <select v-model="membresiaSelected" name="curso_id" class="form-control input-novedades"  required>
                                                    <option :value="null">Seleccione Membresia</option>
                                                    <option :value="membresia" v-for="membresia in membresias" :key="'membresia-'+membresia.id">
                                                        {{membresia.nombre}}
                                                    </option>
                                         </select>
                                            <label for="inicia">Seleccione Plan</label>
                                        <select v-if="membresiaSelected" v-model="planSelected" name="plan_id" class="form-control input-novedades"  required>
                                                    <option :value="null">Seleccione plan</option>
                                                    <option :value="plan.id" v-for="plan in membresiaSelected.planes" :key="'plan-'+plan.id">
                                                        {{plan.nombre}}
                                                    </option>
                                         </select>
                            </div>
                         
                           
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Inscribir Usuario</button>
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
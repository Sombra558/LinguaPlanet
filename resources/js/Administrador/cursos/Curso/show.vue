<template>
    <div class="container">
        <h1>{{curso.titulo}}</h1>
        <span>Nombre del Curso</span>
        <div class="row">
            <button @click.prevent="seleccionartab('modulos')" class="col-sm-12 col-md-3">
                Contenido del curso
            </button>
            <button @click.prevent="seleccionartab('curso')" class="col-sm-12 col-md-3">
                Detalles del curso
            </button>
            <button @click.prevent="seleccionartab('inscritos')" class="col-sm-12 col-md-3">
                Usuarios suscritos    
            </button>
        </div>
        <div v-if="tab==='modulos'">
                <div class="row justify-content-between">
                     <span>Módulos</span>
                     <button @click.prevent="seleccionarModuloModal(null,'crear')">Agregar Mòdulo</button>
                </div>
                <br>
               <div class="row">
                    <div v-for="modulo in curso.modulos" :key="modulo.id" class="col-12">
                        <div class="row">
                            <div class="col-8 d-flex flex-column">
                                 <strong>{{modulo.nombre}}</strong>
                                 <span>{{modulo.clases.length}} clases -  actividades <Cont :modulo="modulo" /></span>
                            </div>
                            <div class="col-4">
                                <button @click.prevent="seleccionarModuloModal(modulo,'Clase')">Agregar Clase</button>
                                <button @click.prevent="seleccionarModuloModal(modulo,'editar')">Editar</button>
                                <button @click.prevent="eliminarModulo(modulo)">Eliminar</button>
                                <button>...</button>
                            </div>
                        </div>
                        <br>
                        <div v-for="(clase, index) in modulo.clases" :key="clase.id" class="col-12">
                        <div class="row">
                            <div class="col-8 d-flex flex-column">
                                 <strong>Semana {{index+1}}</strong>
                            </div>
                            <div class="col-4">
                                <button @click.prevent="seleccionarClase(clase,'actividad')">Agregar Actividad</button>
                                <button @click.prevent="seleccionarClase(clase,'editar')">Editar</button>
                                <button @click.prevent="eliminarClase(clase)">Eliminar</button>
                                <button>...</button>
                            </div>
                        </div>
                          <strong>Actividades</strong>
                          <div v-for="(actividad) in clase.actividades" :key="actividad.id" class="col-12">
                        <div class="row">
                            <div class="col-8 d-flex flex-column">
                              {{actividad.tipo}}
                            </div>
                            <div class="col-4">
                               
                               
                                <button @click.prevent="eliminarActividad(actividad)">Eliminar</button>
                             
                            </div>
                        </div>
                       

                    </div>
                    </div>
                       
                    
                    <br>
                    </div>
               </div>


        </div>
         <div v-if="tab==='curso'">
             <div class="row">
                 <div class="col-6">
                        <h1>General</h1>
                        <span>Nombre del curso</span>
                        <p>{{curso.titulo}}</p>
                        <span>Descripcion</span>
                        <p>{{curso.descripcion}}</p>
                 </div>
                 <div class="col-6">
                        <h1>Membresias</h1>
                        <div class="row">
                            <button @click.prevent="newmember()">Asignar Membresia</button>
                            <div class="col-12" v-for="relacion in curso.membresias" :key="relacion.id">
                                {{relacion.nombre}}
                            </div>
                        </div>
                 </div>
             </div>
              

              <span>Fecha de publicación</span>

              <div class="row">
                <div v-for="modulo in curso.modulos" :key="'id-'+modulo.id" class="col-12">
                    <span>{{modulo.nombre}}</span>
                    <em>{{modulo.inicia}}</em>
                </div>
              </div>
        </div>
         <div v-if="tab==='inscritos'">
                inscritos
        </div>
        <!-- Modal -->
            <div class="modal fade" id="crearModulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{moduloSelected ? 'Editar' : 'Nuevo'}} módulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="formmodulo" @submit.prevent="moduloSelected ? editarModulo(moduloSelected) : crearModulo()">
                        <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre del módulo</label>
                                <input v-if="moduloSelected"  type="text" class="form-control"  v-model="moduloSelected.nombre" required>
                                <input v-else type="text" class="form-control"  name="nombre" v-model="newmodulo.nombre" required>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="finaliza" >Fecha de Inicio</label>
                                <input v-if="moduloSelected" type="date" class="form-control"  v-model="moduloSelected.inicia" required>
                                <input v-else type="date" class="form-control"  name="inicia" v-model="newmodulo.inicia" required>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="inicia" >Fecha de Finalizacion</label>
                                <input v-if="moduloSelected" type="date" class="form-control" v-model="moduloSelected.finaliza" required>
                                <input v-else type="date" class="form-control"  name="finaliza" v-model="newmodulo.finaliza" required>
                              
                        </div>
                         <div class="form-group col-md-6 col-12">
                                <label for="titulo" >Descripcion</label>
                                <textarea v-if="moduloSelected" class="form-control" v-model="moduloSelected.descripcion"  cols="30" rows="10"></textarea>
                                <textarea v-else class="form-control" name="descripcion" v-model="newmodulo.descripcion"  cols="30" rows="10"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">{{moduloSelected ? 'Editar' : 'Agregar'}} Módulo</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>
            </div>
            <!--Modal clase crear-->
            <div v-if="moduloSelected" class="modal fade" id="crearClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="crearClase()">
                        <div class="form-group col-md-6 col-12">
                                <label for="finaliza" >Tipo de Actividad</label>
                                <input type="date" class="form-control"  name="inicia" v-model="newclase.inicia" required>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="inicia" >Fecha de Finalizacion</label>
                                <input type="date" class="form-control"  name="finaliza" v-model="newclase.finaliza" required>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Clase</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>
            </div>
            <!--Modal editar clase-->
            <div v-if="claseSelected" class="modal fade" id="editarClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="editarClase(claseSelected)">
                        <div class="form-group col-md-6 col-12">
                                <label for="finaliza" >Tipo de Actividad</label>
                                <input type="date" class="form-control"  name="inicia" v-model="claseSelected.inicia" required>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="inicia" >Fecha de Finalizacion</label>
                                <input type="date" class="form-control"  name="finaliza" v-model="claseSelected.finaliza" required>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Clase</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>
            </div>
             <!--Modal actividad -->
              <div v-if="claseSelected" class="modal fade" id="crearActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="subiractividad" @submit.prevent="crearActividad()" ref="form">
                        <input type="hidden" :value="claseSelected.id" name="clase_id">
                        <div class="form-group col-md-6 col-12">
                                <label for="finaliza" >Tito de Actividad</label>
                                 <select name="tipo" v-model="actividadtipe" >
                                    <option :value="null">Seleccione Tipo</option>
                                    <option value="Palabras del día">Palabras del día</option>
                                    <option value="Video de apertura">Video de apertura</option>
                                    <option value="Actividad">Actividad</option>
                                    <option value="Libros">Libros</option>
                                    <option value="Mochila">Mochila</option>
                                    <option value="Rompecabeza">Rompecabeza</option>
                                    <option value="Memorama">Memorama</option>
                                    <option value="Silueta">Silueta</option>
                                </select>
                               
                        </div>
                        <div v-if="actividadtipe==='Palabras del día'" class="form-group col-md-6 col-12">
                                <label for="inicia" >Subir video</label>
                                 <input type="file" name="recurso" id="assetsFieldHandle"  />
                               
                        </div>
                         <div v-if="actividadtipe==='Video de apertura'" class="form-group col-md-6 col-12">
                                <label for="inicia" >Subir video</label>
                                <input type="file" name="recurso" id="assetsFieldHandle"  />
                        </div>
                         <div v-if="actividadtipe==='Actividad'" class="form-group col-md-6 col-12">
                                <label for="inicia" >Subir Archivo</label>
                                <input type="file" name="recurso" id="assetsFieldHandle"  />
                               
                        </div>
                         <div v-if="actividadtipe==='Libros'" class="form-group col-md-6 col-12">
                                <label for="inicia" >Subir Archivo</label>
                                <input type="file" name="recurso" id="assetsFieldHandle"  />
                               
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Actividad</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>
            </div>
             <!--Modal Asignacion de Membresia -->
              <div class="modal fade" id="crearRelacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar a Membresia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="relacion-member" @submit.prevent="crearrelacion()" >
                        <input type="hidden" :value="curso.id" name="curso_id">
                        <div class="form-group col-md-12 col-12">
                                <label for="membresia_id" >Seleccione Membresia</label>
                                 <select name="membresia_id" v-model="membresiaSelected" >
                                    <option :value="null">Seleccione</option>
                                    <option :value="membresia.id" v-for="membresia in membresias" :key="'member'+membresia.id">{{membresia.nombre}}</option>
                                  
                                </select>
                               
                        </div>
                   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>
            </div>
    </div>
</template>

<script>
import Cont from './contador.vue';
    export default {
        name:"curso-show",
        props:['curso','membresias'],
        data() {
            return {
                tab: 'modulos',
                newmodulo:{
                    nombre:null,
                    descripcion:null,
                    inicia:null,
                    finaliza:null,
                    curso_id:this.curso.id,
                },
                newclase:{ 
                    inicia:null,
                    finaliza:null,
                    modulo_id:null,
                },
                proceso:false,
                moduloSelected:null,
                claseSelected:null,
                newactividad:{
                    tipo:null,
                    clase_id:null,
                },
                actividadtipe:null,
                lastFile:null,
                membresiaSelected:null,
            }
        },
        components: {
            Cont,
        },
        methods: {
            seleccionartab(value) {
                this.tab=value;
            },
            seleccionarModuloModal(value,action) {
                    if (action==='crear') {
                        this.moduloSelected=null;
                        $("#crearModulo").modal("show");
                    }else if(action==='editar'){
                        this.moduloSelected=value;
                         setTimeout(function(){
                            $("#crearModulo").modal("show");
                        },200)
                    }else{
                        this.moduloSelected=value;
                        this.newclase.modulo_id=value.id;
                        setTimeout(function(){
                                $("#crearClase").modal("show");
                        },200)
                    }
                   
            },
            crearModulo() {
                this.proceso=true;
                var url = '/admin/modulo';
                axios.post(url,this.newmodulo).then((result) => {
                   this.newmodulo.nombre=null;
                   this.newmodulo.descripcion=null;
                   this.newmodulo.inicia=null;
                   this.newmodulo.finaliza=null;
                   $("#crearModulo").modal("hide");
                   this.curso.modulos.push(result.data);
                   this.proceso=false;
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
             editarModulo(modulo) {
                           this.proceso=true;
                           console.log(modulo);
                           let form = $("#formmodulo")[0];
                           let formulario = new FormData(form);
                           formulario.append("nombre", modulo.nombre);
                           formulario.append("inicia", modulo.inicia);
                           formulario.append("finaliza", modulo.finaliza);
                           formulario.append("descripcion", modulo.descripcion);
                           var ruta = '/admin/modulo/'+modulo.id;
                            axios.put(ruta, formulario)
                                .then((res) => {
                                   $("#crearModulo").modal("hide");
                                })
                                .catch((err) => {
                                    this.proceso=false;
                                    console.log(err);
                        });
              
            },
              eliminarModulo(modulo) {
                this.proceso=true;
                var url = '/admin/modulo/'+modulo.id;
                axios.delete(url).then((result) => {
                  window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
     
            seleccionarClase(value, action) {
                  if(action==='editar'){
                       this.claseSelected=value;
                         setTimeout(function(){
                            $("#editarClase").modal("show");
                        },200)
                    }else{
                        this.claseSelected=value;
                        this.newactividad.clase_id=value.id;
                        setTimeout(function(){
                                $("#crearActividad").modal("show");
                        },200)
                    }
                
                this.claseSelected=value;
                this.newclase.modulo_id=value.id;
                 setTimeout(function(){
                        $("#crearClase").modal("show");
                },200)
            },
            crearClase() {
                this.proceso=true;
                var url = '/admin/clase';
                axios.post(url,this.newclase).then((result) => {
           
                   this.newclase.inicia=null;
                   this.newclase.finaliza=null;
                   this.newclase.modulo_id=null;
                   $("#crearClase").modal("hide");
                   window.location.reload();
                   this.proceso=false;
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
             editarClase(clase) {
                this.proceso=true;
                var url = '/admin/clase/'+clase.id;
                axios.post(url,clase).then((result) => {
           
                  
                   $("#editarClase").modal("hide");
                   //window.location.reload();
                   this.proceso=false;
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            },
             eliminarClase(clase) {
                this.proceso=true;
                var url = '/admin/clase/'+clase.id;
                axios.delete(url).then((result) => {
                   window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
            }, 
            crearActividad() {
                console.log('creando');
                this.proceso=true;
                let form = $("#subiractividad")[0];
                let formulario = new FormData(form);
                var ruta ='/admin/actividad';
                    axios.post(ruta, formulario)
                        .then((res) => {
                            window.location.reload();
                        })
                        .catch((err) => {
                            this.proceso=false;
                            console.log(err);
                });
                },
            editarActividad() {
                console.log('creando');
                this.proceso=true;
                let form = $("#subiractividad")[0];
                let formulario = new FormData(form);
                var ruta ='/admin/actividad';
                    axios.post(ruta, formulario)
                        .then((res) => {
                            window.location.reload();
                        })
                        .catch((err) => {
                            this.proceso=false;
                            console.log(err);
                });
                },
            eliminarActividad(clase) {
                this.proceso=true;
                var url = '/admin/actividad/'+clase.id;
                axios.delete(url).then((result) => {
                   window.location.reload();
                }).catch((err) => {
                    console.log(err);
                     this.proceso=false;
                });
                }, 
                newmember() {
                
                $("#crearRelacion").modal("show");
               
                },
                crearrelacion(){
                           this.proceso=true;
                           let form = $("#relacion-member")[0];
                           let formulario = new FormData(form);
                           var ruta ='/admin/relacion';
                            axios.post(ruta, formulario)
                                .then((res) => {
                                    window.location.reload();
                                })
                                .catch((err) => {
                                    this.proceso=false;
                                    console.log(err);
                        });
                }
              
        },
    }
</script>

<style lang="scss" scoped>

</style>
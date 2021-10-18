<template>
    <div class="container">
        <div class="row mb-3">
            <a class="color-plomo" href="/admin/cursos">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Volver
            </a>
        </div>
        <div class="row gray-back py-3 mb-3">
            <div class="col">
                <h2>{{curso.titulo}}</h2>
                <span class="color-plomo" style="font-size: 1rem;">Nombre del Curso</span>
            </div>
        </div>
        <div class="row">
            <div class="col p-0">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link color-black active" id="curso-contenido-tab" data-toggle="tab" href="#curso-contenido" role="tab" aria-controls="curso-contenido" aria-selected="true">Contenido del curso</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link color-black" id="curso-detalles-tab" data-toggle="tab" href="#curso-detalles" role="tab" aria-controls="curso-detalles" aria-selected="false">Detalles del curso</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link color-black" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios suscritos</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="curso-contenido" role="tabpanel" aria-labelledby="curso-contenido-tab">
                        <div v-if="!curso.modulos.length" class="row">
                            <div class="col">
                                <button class="btn btn-primary btn-lg my-4 mx-0 mx-lg-4 float-right" @click.prevent="seleccionarModuloModal(null,'crear')">Agregar Módulo</button>
                            </div>
                        </div>
                        <div v-if="!curso.modulos.length" class="row my-auto">
                            <div class="col text-center">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="60" height="60" rx="30" fill="#B5B5BB"/>
                                    <path d="M35 21.0003C35.2626 20.7377 35.5744 20.5293 35.9176 20.3872C36.2608 20.245 36.6286 20.1719 37 20.1719C37.3714 20.1719 37.7392 20.245 38.0824 20.3872C38.4256 20.5293 38.7374 20.7377 39 21.0003C39.2626 21.2629 39.471 21.5747 39.6131 21.9179C39.7553 22.2611 39.8284 22.6289 39.8284 23.0003C39.8284 23.3717 39.7553 23.7395 39.6131 24.0827C39.471 24.4259 39.2626 24.7377 39 25.0003L25.5 38.5003L20 40.0003L21.5 34.5003L35 21.0003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class="color-plomo d-block mt-3">Crea contenido para tus<br>cursos aquí</span>
                            </div>
                        </div>
                        <div v-else class="row">
                            <div class="col-12 block-btn mt-3">
                                <button class="btn btn-primary btn-block mx-0" @click.prevent="seleccionarModuloModal(null,'crear')">Agregar Módulo</button>
                            </div>
                            <div class="col-12">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-4" style="background-color: transparent;">
                                        <span class="color-plomo list-modulos-header">Módulos</span>
                                        <button class="btn btn-primary btn-nuevo-modulo mx-0" @click.prevent="seleccionarModuloModal(null,'crear')">Agregar Módulo</button>
                                    </li>
                                </ul>
                                <div class="accordion" id="accordionExample">
                                    <div class="card" v-for="(modulo, index) in curso.modulos" :key="modulo.id">
                                        <div class="card-header" id="headingOne" style="position: relative">
                                            <div :id="`options${index}`" class="popover d-none" role="tooltip" style="width: 12rem; z-index: 2;position: absolute;top: 48px;left: 43.2rem;">
                                                <div class="arrow"></div>
                                                <h3 class="popover-header"></h3>
                                                <div class="popover-body px-4">
                                                    <div class="row py-2">
                                                        <button class="edit-mobile img-btn" @click.prevent="seleccionarModuloModal(modulo,'editar')">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                            Editar
                                                        </button>
                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="col">
                                                            <button class="transparent-button" @click.prevent="seleccionarModuloModal(modulo,'Clase')">Agregar Clase</button>
                                                        </div>                                
                                                    </div>
                                                    <div class="row py-2">
                                                        <div class="col">
                                                            <button class="transparent-button" @click.prevent="eliminarModulo(modulo)">Eliminar</button>
                                                        </div>                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                
                                                <div class="col-9 d-flex flex-column">
                                                    <span class="list-modulos-header">{{modulo.nombre}}</span>
                                                    <span v-if="!modulo.clases.length" class="color-plomo">{{modulo.clases.length}} Clases - <Cont :modulo="modulo" /> Actividades</span>
                                                    <a v-else href="#" data-toggle="collapse" :data-target="`#collapse${index}`" aria-expanded="true" :aria-controls="`collapse${index}`">
                                                        <span class="fw-400 color-plomo">{{ modulo.clases.length }} Actividades</span>
                                                    </a>
                                                </div>
                                                <div class="col-3 d-flex justify-content-around">
                                                    <button class="edit-desktop img-btn" @click.prevent="seleccionarModuloModal(modulo,'editar')">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        Editar
                                                    </button>
                                                    <button type="button" class="btn-options" @click="showOptions($event, `options${index}`)">
                                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="2" cy="2" r="2" fill="#606060"/>
                                                            <circle cx="9" cy="2" r="2" fill="#606060"/>
                                                            <circle cx="16" cy="2" r="2" fill="#606060"/>
                                                        </svg>
                                                    </button>
                                                </div>                                                                                         
                                            </div>
                                        </div>
                                        <div :id="`collapse${index}`" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="accordion" id="accordionActividades">
                                                    <div v-for="(clase, index) in modulo.clases" :key="clase.id" class="card">
                                                        <div :id="`optionsClass${index}`" class="popover d-none" role="tooltip" style="width: 12rem; z-index: 2;position: absolute;top: 48px;left: 43.2rem;">
                                                            <div class="arrow"></div>
                                                            <h3 class="popover-header"></h3>
                                                            <div class="popover-body px-4">
                                                                <div class="row py-2">
                                                                    <button class="btn transparent-button" @click.prevent="seleccionarClase(clase,'actividad')">Agregar Actividad</button>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col">
                                                                        <button class="transparent-button color-plomo" @click.prevent="seleccionarClase(clase,'editar')">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M12 20H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                            <span class="ml-1">
                                                                                Editar
                                                                            </span>
                                                                        </button>
                                                                    </div>                                
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col">
                                                                        <button class="transparent-button color-plomo" @click.prevent="eliminarClase(clase)">
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
                                                                    </div>                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-header" id="headingOne">
                                                          <div class="row">
                                                                <div class="col-10">
                                                                    <span class="d-block fw-400">Clase/Semana {{index+1}}</span>
                                                                    <span v-if="!clase.actividades.length" class="d-block fw-400 color-plomo">{{ clase.actividades.length }} Actividades</span>
                                                                    <a v-else href="#" data-toggle="collapse" :data-target="`#collapseActividades${index}`" aria-expanded="true" :aria-controls="`collapseActividades${index}`">
                                                                        <span class="fw-400 color-plomo">{{ clase.actividades.length }} Actividades</span>
                                                                    </a>
                                                                </div>
                                                                <div class="col-2 text-center">                                                            
                                                                    <button type="button" class="btn-options" @click="showOptions($event, `optionsClass${index}`)">
                                                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="2" cy="2" r="2" fill="#606060"/>
                                                                            <circle cx="9" cy="2" r="2" fill="#606060"/>
                                                                            <circle cx="16" cy="2" r="2" fill="#606060"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div :id="`collapseActividades${index}`" class="collapse" aria-labelledby="headingOne" data-parent="#accordionActividades">
                                                          <div class="card-body p-0">
                                                            <ul class="list-group list-group-flush">
                                                              <li class="list-group-item list-group-item-action" v-for="(actividad) in clase.actividades" :key="actividad.id">
                                                                <div class="row align-items-center">
                                                                      <div class="col-8 d-flex flex-column">
                                                                        <span >{{actividad.tipo}}</span>
                                                                      </div>
                                                                      <div class="col-4 text-center">
                                                                          <button class="btn btn-sm btn-outline-secondary" @click.prevent="editarActividad(actividad)">Editar</button>
                                                                          <button class="btn btn-sm btn-outline-secondary" @click.prevent="eliminarActividad(actividad)">Eliminar</button>
                                                                      </div>
                                                                  </div>
                                                              </li>
                                                            </ul>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade px-4 py-4" id="curso-detalles" role="tabpanel" aria-labelledby="curso-detalles-tab">
                        <div class="row flex-lg-row-reverse mb-3">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <h3 class="fw-500 color-black mb-0">Membresias</h3>                                                                    
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <button class="btn btn-block btn-sm btn-primary" @click.prevent="newmember()">Asignar Membresia</button>    
                                    </div>
                                    <div class="col-12 mb-2" >
                                        <ul class="list-group list-group-flush color-black">
                                            <li class="list-group-item d-flex justify-content-between" v-for="relacion in curso.membresias" :key="relacion.id">
                                                <span>{{relacion.nombre}}</span>
                                                <button class="btn btn-sm py-0 btn-outline-secondary" @click.prevent="eliminarRelacion(relacion)" >Eliminar</button>
                                            </li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 color-black">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h3 class="fw-500 color-black">General</h3>
                                    </div>
                                    <div class="col-12">
                                        <span class="h6 d-block">Nombre del curso</span>
                                        <span>{{curso.titulo}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 color-black">
                            <div class="col-12">
                                <span class="h6 d-block">Descripción</span>
                                <span>{{curso.descripcion}}</span>
                            </div>
                        </div>
                        <div class="row color-black">
                            <div class="col-12">
                                <span class="h6 d-block">Fecha de publicación</span>
                                <div v-for="modulo in curso.modulos" :key="'id-'+modulo.id">
                                    <span>{{modulo.nombre}}</span>
                                    -
                                    <em>{{modulo.inicia}}</em>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                        Inscritos
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="crearModulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form class="w-100" id="formmodulo" @submit.prevent="moduloSelected ? editarModulo(moduloSelected) : crearModulo()">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-500 color-black mb-4" id="exampleModalLabel">{{moduloSelected ? 'Editar' : 'Nuevo'}} módulo</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nombre" >Nombre del módulo</label>
                                    <input v-if="moduloSelected"  type="text" class="form-input input-primary"  v-model="moduloSelected.nombre" required>
                                    <input v-else type="text" class="form-input input-primary" placeholder="Ingresa el nombre" name="nombre" v-model="newmodulo.nombre" required>
                                </div>
                                <div class="form-group col-12">
                                    <label for="finaliza" >Fecha de Inicio</label>
                                    <input v-if="moduloSelected" type="date" class="form-input input-primary"  v-model="moduloSelected.inicia" required>
                                    <input v-else type="date" class="form-input input-primary" name="inicia" v-model="newmodulo.inicia" required>
                                </div>
                                <div class="form-group col-12">
                                    <label for="inicia" >Fecha de Finalizacion</label>
                                    <input v-if="moduloSelected" type="date" class="form-input input-primary" v-model="moduloSelected.finaliza" required>
                                    <input v-else type="date" class="form-input input-primary"  name="finaliza" v-model="newmodulo.finaliza" required>
                                </div>
                                 <div class="form-group col-12">
                                    <label for="titulo" >Descripcion</label>
                                    <textarea v-if="moduloSelected" class="form-input input-primary" v-model="moduloSelected.descripcion" cols="30" rows="5"></textarea>
                                    <textarea v-else class="form-input input-primary" name="descripcion" v-model="newmodulo.descripcion" placeholder="Descripción" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-outline-secondary" data-dismiss="modal" style="font-weight: 500;">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-lg btn-primary">{{moduloSelected ? 'Editar' : 'Agregar'}} Módulo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal clase crear-->
        <div v-if="moduloSelected" class="modal fade" id="crearClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form @submit.prevent="crearClase()">
                        <div class="modal-body pt-0 px-5">
                            <div class="row">
                                <div class="col">
                                    <h4 class="fw-500 color-black mb-4" id="exampleModalLabel">Nueva Clase</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="color-plomo" for="finaliza" >Tipo de Actividad</label>
                                    <input type="date" class="form-input input-gray"  name="inicia" v-model="newclase.inicia" required>
                                </div>    
                            </div>                            
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="color-plomo" for="inicia" >Fecha de Finalizacion</label>
                                    <input type="date" class="form-input input-gray"  name="finaliza" v-model="newclase.finaliza" required>   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-outline-secondary fw-500" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-lg btn-primary">Agregar Clase</button>
                        </div>
                    </form>          
                </div>
            </div>
            </div>
            <!--Modal editar clase-->
            <div v-if="claseSelected" class="modal fade" id="editarClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <form @submit.prevent="editarClase(claseSelected)">
                            <div class="modal-body pt-0 px-5">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-500 color-black mb-4" id="exampleModalLabel">Editar Clase</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="finaliza" >Tipo de Actividad</label>
                                        <input type="date" class="form-input input-gray" name="inicia" v-model="claseSelected.inicia" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="inicia" >Fecha de Finalizacion</label>
                                        <input type="date" class="form-input input-gray" name="finaliza" v-model="claseSelected.finaliza" required>   
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary fw-500" data-dismiss="modal">Cancelar</button>
                                <button :disabled="proceso" type="submit" class="btn btn-primary">Editar Clase</button>
                            </div>
                        </form>              
                    </div>
                </div>
            </div>
             <!--Modal actividad -->
            <div v-if="claseSelected" class="modal fade" id="crearActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <form id="subiractividad" @submit.prevent="crearActividad()" ref="form">
                            <div class="modal-body pt-0 px-5">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-500 color-black mb-4" id="exampleModalLabel">Nueva Actividad</h4>
                                    </div>
                                </div>
                                <input type="hidden" :value="claseSelected.id" name="clase_id">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="finaliza" >Tipo de actividad</label>
                                        <select class="form-input input-gray" name="tipo" v-model="actividadtipe" >
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
                                </div>
                                <div class="row">
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-lg btn-outline-secondary fw-500" data-dismiss="modal">Cancelar</button>
                                <button :disabled="proceso" type="submit" class="btn btn-lg btn-primary">Agregar Actividad</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             <!--Modal Asignacion de Membresia -->
            <div class="modal fade" id="crearRelacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fw-500" id="exampleModalLabel">Asignar a Membresia</h5>
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
import Multiselect from 'vue-multiselect'
    export default {
        name:"curso-show",
        props:['curso','membresias','siluetas'],
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
                    siluetas:null
                },
                actividadtipe:null,
                lastFile:null,
                membresiaSelected:null
            }
        },
        components: {
            Cont, Multiselect,
        },
        mounted() {
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();
            });
        },
        methods: {
            showOptions(element, index) {
                document.querySelector(`.popover.d-block:not(#${index})`)?.classList.replace('d-block', 'd-none')
                $(`#${index}`).toggleClass('d-block');
                $(`#${index}`).toggleClass('d-none');
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
                            //window.location.reload();
                            this.proceso=false;
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
                },
                eliminarRelacion(relacion){
                      this.proceso=true;
                      var url = '/admin/eliminar-relacion/'+relacion.pivot.id;
                      axios.delete(url).then((result) => {
                        window.location.reload();
                      }).catch((err) => {
                        console.log(err);
                        this.proceso=false;
                      });
                }              
        },
    }
</script>

<style lang="scss" scoped>
    .nav-link {
        border-color: #B5B5BB !important;
        border-radius: 0;
        font-weight: 500;
    }

    .nav-link.active {
        border-color: #B5B5BB !important;
        border-top: 2px solid #31348B !important;
        border-bottom: none;
        border-left: none;
        color: #31348B !important;
        background-color: #F8F8F8 !important;
    }

    #curso-contenido {
        background-color: #F8F8F8;
        height: 60vh;
    }

    #curso-detalles {
        background-color: #F8F8F8;
    }

    .modal-header {
        border-bottom: none;
    }

    .form-input {
        padding: 9px 16px !important;
    }

    .form-group label {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #606060 !important;
        font-weight: 400 !important;
        font-size: 1rem !important;
    }

    .form-input::-webkit-datetime-edit {
        color: #606060 !important;
        font-weight: 400 !important;
        font-size: 1rem !important;
    }

    .form-input::-webkit-calendar-picker-indicator {
        background-image: url('/images/calendar-dark.svg');
        background-origin: content-box;
        background-size: contain;
        height: 1.2em;
        margin-inline-start: 24px;
        opacity: 1;
        padding-bottom: 2px;
        padding-inline-start: 3px;
        padding-inline-end: 3px;
        padding-top: 2px;
        width: 1.2em;
        background-repeat: no-repeat;
        outline: none;
    }

    #assetsFieldHandle::-webkit-file-upload-button {
        background: #F8F8F8;
        border: 1px solid #606060;
        box-sizing: border-box;
        border-radius: 8px;
        font-weight: 500;
        padding: 0.5rem 1.5rem;
    }

    .modal-footer {
        border-top-color: #B5B5BB;
        background-color: #F8F8F8;
    }

    .list-modulos-header {
        font-weight: 400;
        font-size: 1rem;
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

    .img-btn {
        color: #606060;
        font-size: 1rem;
    }

    .block-btn {
        display: none;
    }

    @media(max-width: 768px) {
        .btn.btn-lg:not(.btn-nuevo-modulo) {
            display: block;
            width: 100%;
        }

        .btn-nuevo-modulo {
            display: none;
        }

        .block-btn {
            display: block;
        }

        .block-btn {
            display: block;
        }

        .edit-mobile {
            display: block;
        }

        .edit-desktop {
            display: none;
        }
    }
</style>
<template>
    <div class="col-12">
        <div class="card mx-3">
            <div class="card-body">
                <ul class="list-group">
                    <li class="d-none d-md-flex flex-fill py-3">
                        <div clasS="col-3 p-0">
                            <span class="h5 text-dark flex-fill">
                                Idiomas
                            </span>    
                        </div>
                        <div class="col-9 p-0">
                            <span class="h5 text-dark flex-fill">
                                Membresías    
                            </span>    
                        </div>            
                    </li>
                    <li class="list-group-item py-3" v-for="plan in membresias" :key="plan.id">
                        <div class="row">
                            <div class="text-center idioma-title text-md-left col-12 col-md-3 col-lg-3">
                                {{plan.membresia.idioma.idioma}}
                            </div>
                            <div clasS="col-12 col-md-9 col-lg-9 p-0">
                                <PlanCard  @mostrarasignacion="mostrarasignacion" :plan="plan"/>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Modal -->
            <div v-if="planSelected" class="modal fade" id="asignacionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>    
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col">
                            <h2>Selección de perfil que tendrá acceso al curso</h2>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col px-2">
                            <ul class="list-group">
                                <li class="list-group-item border-0" v-for="perfil in perfiles" :key="perfil.id">
                                    <div class="d-flex justify-content-between py-2 my-2" style="background-color: #F8F8F8;">
                                        <span class="d-flex align-items-center">
                                            <div class="globe-profile-student mx-3" :style="{'background-color' : perfil.color}">
                                                <img class="h-75"
                                                     :src="`${perfil.avatar.cara}`"
                                                >
                                            </div>
                                            <span class="h5 mb-0">{{perfil.apodo}}</span>
                                        </span>
                                        <span class="d-flex justify-content-center w-25">
                                            <label :for="`check${perfil.id}`" class="containercb mb-0 my-2" id="c2">
                                              <input type="radio" :value="perfil.id" v-model="perfilSelected" :id="`check${perfil.id}`">
                                              <span class="checkmark"></span>
                                            </label>
                                        </span>
                                        <!-- <input type="radio" v-model="perfiSelected" :value="perfil"/> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col my-5 text-center">
                            <button type="button" @click.prevent="asignar()" class="btn btn-primary py-2 px-5">Continuar</button>
                        </div>
                    </div>              
                </div>
                </div>
            </div>
            </div>
    </div>
</template>

<script>
import PlanCard from './planCard';
    export default {
        name:"activas-component",
        props:["membresias","perfiles"],
        data() {
            return {
                planSelected: null,
                perfilSelected:null,
            }
        },
        components: {
            PlanCard,
        },
        methods: {
             mostrarasignacion(plan){
                if (plan) {
                    this.planSelected=plan;
                }
                setTimeout(function(){
                $("#asignacionmodal").modal("show");
                },200)
            },
            asignar(){
                var url = '/home/asignar-plan';
                axios.post(url,{
                    plan_user_id:this.planSelected.pivot.id,
                    perfil_estudiante_user_id:this.perfilSelected,
                }).then((result) => {
                    switch (result.data.codigo) {
                            case 'E26741':
                                console.log(result.data.message);
                            break;
                            case 'E26742':
                                console.log(result.data.message);
                            break;
                            default:
                                location.href = '/home/';
                                break;
                    }
                }).catch((err) => {
                    console.log(err);
                });
            }
        },
    }
</script>

<style lang="scss" scoped>
    #c2 input:checked ~ .checkmark {
        background-color: #00A53F;
        border-color: #00A53F;
    }
    /* Contenedor */
    .containercb {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
    }

    /* escondemos el default checkbox */
    .containercb input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* creamos un custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #F8F8F8;
      border: 2px solid #B5B5BB;
      box-sizing: border-box;
      border-radius: 8px;
    }

    /* Al pasar el mouse encima, lo ponemos gris */
    .containercb:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* creamos el marcador (escondido al no seleccionar) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* mostramos el marcador al seleccionar */
    .containercb input:checked ~ .checkmark:after {
      display: block;
    }

    /* estilo del marcador */
    .containercb .checkmark:after {
      left: 6px;
      top: 1px;
      width: 9px;
      height: 15px;
      border: solid white;
      border-width: 0 3px 3px 0;
      transform: rotate(45deg);
    }
    .globe-profile-student {
        padding : 5px;
        display : flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 35px;
        border-radius: 8px;
        color : white;
        font-size : 20px;
    }
    .modal-header {
        border-bottom : none;
    }
    .list-group-item {
        border : none;
    }
    .idioma-title {
        color : #606060;
        font-size : 1.2rem;
        font-weight : 500;
    }
    @media (min-width : 768px) {
        .idioma-title {
            color : #31348B;
            font-size : 1rem;
            font-weight : 400;
        }
        
        .list-group-item {
            padding : 0;
            border : none;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }    
    }    
</style>
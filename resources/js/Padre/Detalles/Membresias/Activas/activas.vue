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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{planSelected.nombre}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select name="perfil_id" v-model="perfilSelected">
                        <option :value="null">Seleccione Perfil</option>
                        <option v-for="perfil in perfiles" :key="perfil.id" :value="perfil">{{perfil.apodo}}</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" @click.prevent="asignar()" class="btn btn-primary">Asignar</button>
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
                    perfil_estudiante_user_id:this.perfilSelected.id,
                }).then((result) => {
                    switch (result.data.codigo) {
                            case 'E26741':
                                console.log(result.data.message);
                            break;
                            case 'E26742':
                                console.log(result.data.message);
                            break;
                            default:
                                window.location.reload();
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
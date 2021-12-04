<template>
    <div class="card card-rounded p-0 text-white bg-primary mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-lg-5 col-6 d-flex justify-content-between align-items-center">
                    <span class="h4 m-0">{{ perfil.apodo }}</span>
                    <span class="mb-0 pl-3 progress-value d-flex align-items-center">{{ progreso.toFixed(1) }}%</span>
                </div>
                <div class="col-sm-6 col-lg-7 col-6 d-flex align-items-center">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" :style="'border-radius : 50px; width:'+progreso.toFixed(2)+'%'" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button class="btn btn-primary p-0 mx-4 deployBtn" @click="deployActivities = !deployActivities" data-toggle="collapse" :data-target="`#collapse${this.perfil.id}`" aria-expanded="false" aria-controls="collapseExample">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.125 9.75L13 17.875L4.875 9.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h4 v-if="deployActivities" class="card-title">Actividades completadas</h4>
            <h4 v-else class="card-title">Cursos</h4>
            <span v-if="!deployActivities" class="card-text">
                <img v-for="(curso, index) in miscursostotales" :key="curso.curso.id" :class="['flag-language', { 'mx-1' : index > 0 }]" :src="curso.curso.idioma.src">
            </span>
            <div class="collapse" :id="`collapse${this.perfil.id}`">
                <div v-for="curs in miscursostotales"  :key="curs.curso.id" class="row mt-3">
                    <div class="col-12">
                        <img class="flag-language mx-1" :src="curs.curso.idioma.src">
                        <span>{{curs.curso.titulo}}</span>
                    </div>
                    <div v-if="curs.curso.modulos.length > 0" class="col-7 py-3 d-flex justify-content-between">
                        <span v-if="curs.curso.modulos[0].clases.length>0" class="col-12 py-3 d-flex justify-content-between">
                            <span v-for="actividad in curs.curso.modulos[0].clases[0].actividades" :key="actividad.id">
                                <!-- checked -->
                                <svg v-if="perfil.misactividades.some(evt => evt.pivot.actividad_id===actividad.id)" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="#00A53F"/>
                                    <path d="M19.6666 8L10.4999 17.1667L6.33325 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <!-- unchecked -->
                                <svg v-else width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="white"/>
                                    <path d="M19.6666 8L10.4999 17.1667L6.33325 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </span>                     
                    </div>
                    <div v-else class="col-7 py-3 d-flex justify-content-between">
                        <p>No hay Clase esta Semana</p>
                    </div>
                    <div class="col-5 text-center d-flex justify-content-center align-items-center">
                        <a v-if="curs.curso.modulos.length > 0" class="btn btn-light btn-lg text-primary" :href="'/home/detalles-avance-individual/cursos/'+perfil.id">
                            <span class="fw-600">
                                Ver contenidos
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['perfil'],
        name:"progreso-card-component",
        data() {
            return {
                deployActivities : false,
                miscursostotales: [],
            }
        },
        computed: {
            progreso() {
                var prog=0;
                this.miscursostotales.forEach(curso => {
                    curso.curso.progresos.forEach(progreso => {
                        if (progreso.perfil_id===this.perfil.id) {
                            prog=prog+progreso.progreso;
                        }
                    });
                });
                console.log(prog);
                if (prog>0) {
                    return prog/this.miscursostotales.length*100;
                }else{
                    return prog;
                }
            }
        },
        mounted () {
           this.perfil.planes.forEach(plan => {
               plan.plan.membresia.cursos.forEach(curso => {
                   var temp = {
                       curso:curso,
                       idioma:plan.plan.membresia.idioma,
                   };
                 

                   this.miscursostotales.push(temp);

               }); 
           }); 
        },
    }
</script>

<style scoped>
    
    .btn {
        border-radius: 12px;
    }

    .progress-value {
        font-size: 1.2rem;
        height: 2.2rem;
        border-left: 1px solid gray;
        min-width: 3.6rem;
    }

    .progress {
        width : 85%;
        display : inline-flex;
        height : 16px;
        border-radius : 50px;
    }
    .flag-language {
        width : 1.5rem;
        border-radius : 50px;
    }
    .card-progreso{
        width: 100%;
    }
    @media(max-width : 768px) {
        .deployBtn { display : none; }
    }
</style>
<template>
    <div class="card card-rounded p-0 text-white bg-primary mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-6 d-flex justify-content-between align-items-center">
                    <span class="h4">{{ perfil.apodo }}</span>
                    <span class="mb-0 pl-3" style="border-left : 1px solid gray;">25%</span>
                </div>
                <div class="col-sm-6 col-lg-8 col-6">
                    <div class="progress ml-2">
                        <div class="progress-bar bg-success" role="progressbar" style="border-radius : 50px; width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button class="btn btn-primary p-0 deployBtn" @click="deployActivities = !deployActivities" data-toggle="collapse" :data-target="`#collapse${this.perfil.id}`" aria-expanded="false" aria-controls="collapseExample">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.125 9.75L13 17.875L4.875 9.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h4 v-if="deployActivities" class="card-title">Actividades completadas</h4>
            <h4 v-else class="card-title">Cursos</h4>
            <p v-if="!deployActivities" class="card-text">
                <img v-for="i in 3" class="flag-language mx-1" :src="'/images/es.svg'">
            </p>
            <div class="collapse" :id="`collapse${this.perfil.id}`">
                <div v-for="i in 3" class="row mt-3">
                    <div class="col-12">
                        <img class="flag-language mx-1" :src="'/images/es.svg'">
                        <span>Curso de Español</span>
                    </div>
                    <div class="col-7 py-3 d-flex justify-content-around">
                        <span v-for="i in 5">
                            <!-- checked -->
                            <svg v-if="i <= 3" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="26" height="26" rx="13" fill="#00A53F"/>
                                <path d="M19.6666 8L10.4999 17.1667L6.33325 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <!-- unchecked -->
                            <svg v-else width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="26" height="26" rx="13" fill="white"/>
                                <path d="M19.6666 8L10.4999 17.1667L6.33325 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>
                    <div class="col-5 text-center d-flex justify-content-center align-items-center">
                        <a class="btn btn-light btn-lg text-primary" href="#"><span class="h6">Ver contenido</span></a>
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
            }
        }
    }
</script>

<style scoped>
    .progress {
        width : 85%;
        display : inline-flex;
        margin-top : 6px;
        height : 16px;
        border-radius : 50px;
    }
    .flag-language {
        width : 20px;
        border : 1px solid white;
        border-radius : 50px;
    }
    .card-progreso{
        width: 100%;
    }
    @media(max-width : 768px) {
        .deployBtn { display : none; }
    }
</style>
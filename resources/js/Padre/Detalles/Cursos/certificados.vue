<template>
    <div class="container">
        <div class="perfiles">            
            <a href="/home/detalles-avances/cursos">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 16H5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 7L5 16L14 25" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <span class="h4 bold ml-4">Certificados</span>
            <div class="row overflow-auto pb-3">
                <div class="col-12 mt-3 d-flex">
                    <button v-for="o in 4" class="btn gray-back px-3 py-2 mx-2" style="border-radius : 50px;">
                        <span class="h5">Christopher</span>
                    </button>
                </div>
            </div>            
        </div>
        <div class="certificados">
            <div class="row mt-4">
                <div v-for="i in 3" class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="card card-rounded" style="min-height: 150px;">
                        <span class="m-0 d-flex flex-inline justify-content-between">
                            <h3>Curso de Ingles</h3>
                            <svg class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 10L12 15L17 10" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 15V3" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="color-plomo">
                            30 de Julio de 2021
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProgesoCard from './progresoCard';
import PerfilCard from './perfilCard';
    export default {
        name:"cursos-detalle-padre",
        props:['user'],
        components: {
            ProgesoCard,PerfilCard
        },
    }
</script>

<style scoped>
    .container {
        margin : 20px auto;
        display : grid;
        grid-template-columns : repeat(3, 1fr);
        grid-auto-rows : minmax(100px, auto);
        grid-template-areas : 
        "perfiles perfiles perfiles"
        "certificados certificados certificados"
        "certificados certificados certificados";
    }
    .perfiles {
        grid-area : perfiles;
    }
    .certificados {
        grid-area : certificados;
    }
    .flag-language {
        width : 25px;
        border : 1px solid white;
        border-radius : 50px;
    }
    .card-rounded{
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .profile-bg {
        background-size: 100% 100%;
        width : 100px;
        height : 100px;
        border-radius : 50px;
    }
    .divider {
        border: 0.5px solid #B5B5BB;
        width: 100%;
    }
</style>
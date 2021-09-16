<template>
    <div class="container">
        <div class="perfil">            
            <a href="/home/detalles-avances/cursos">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 16H5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 7L5 16L14 25" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <span class="h4 bold ml-4">Progreso individual</span>            
            <div class="card card-rounded mt-3">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="profile-bg" :style="`background-color: ${perfil.color};`">
                         <cara-avatar class="w-100 h-100" viewBox="0 0 250 250" :perfil="perfil"/>
                    </div>
                    <div class="ml-3 flex-fill">
                        <span class="h4 m-0 bold d-flex justify-content-between align-items-center text-dark">
                            {{perfil.apodo}}
                            <a href="#">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d)">
                                        <rect x="8" y="6" width="34" height="34" rx="17" fill="#F8F8F8"/>
                                        <path d="M22 31.2499H17.5C17.3011 31.2499 17.1103 31.1709 16.9697 31.0302C16.829 30.8896 16.75 30.6988 16.75 30.4999V26.3105C16.75 26.2121 16.7694 26.1145 16.8071 26.0235C16.8448 25.9325 16.9 25.8499 16.9697 25.7802L28.2197 14.5302C28.3603 14.3896 28.5511 14.3105 28.75 14.3105C28.9489 14.3105 29.1397 14.3896 29.2803 14.5302L33.4697 18.7196C33.6103 18.8602 33.6893 19.051 33.6893 19.2499C33.6893 19.4488 33.6103 19.6396 33.4697 19.7802L22 31.2499Z" stroke="#31348B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M25.75 17L31 22.25" stroke="#31348B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <filter id="filter0_d" x="0" y="0" width="50" height="50" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                            <feOffset dy="2"/>
                                            <feGaussianBlur stdDeviation="4"/>
                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                        </filter>
                                    </defs>
                                </svg>
                            </a>
                        </span>
                        <a href="#"><span class="color-plomo">Ver reportes</span></a>
                    </div>     
                </div>
            </div>
        </div>        
        <div class="actividades card gray-back mt-3 p-lg-4">
            <div class="col-12">
                <div class="mt-3">
                    <span class="h4 bold">Actividades realizadas</span>
                </div>
                <div v-for="(curso, index) in miscursostotales" :key="index" class="row mt-3">
                    <div class="col-12">
                        <span>{{curso.curso.titulo}}</span>
                    </div>
                     <div v-for="modulo in curso.curso.modulos" class="col-12" :key="'modulo-'+modulo.id" >
                              <div v-for="clase in modulo.clases" :key="'clase-'+clase.id" class="col-12 py-3 d-flex justify-content-between">
                                    <span v-for="act in clase.actividades" :key="act.id">
                                        <!-- checked -->
                                        <svg v-if="perfil.misactividades.some(evt => evt.pivot.actividad_id===act.id)" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="26" height="26" rx="13" fill="#00A53F"/>
                                            <path d="M19.6666 8L10.4999 17.1667L6.33325 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <!-- unchecked -->
                                        <svg v-else width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="26" height="26" rx="13" fill="#B5B5BB"/>
                                            <path d="M19.6666 8L10.5 17.1667L6.33331 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>

                     </div>
                  
                </div>
            </div>
        </div>        
        <div class="contenido">
            <div class="row">
                <div class="col-12 mb-3 mt-4 px-4">
                    <span class="h4 bold">Contenidos de la semana</span>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div v-for="curso in miscursostotales" :key="curso.id" class="col-12 mb-3">
                            <div class="card card-rounded flex-fill">
                                <div class="card-body p-0">
                                    <div class="col-12 p-0 d-flex justify-content-between">
                                        <span class="h5">
                                            <img class="flag-language mx-1" :src="curso.idioma.src">
                                             {{curso.curso.titulo}}
                                        </span>                                    
                                        <!--No es posible
                                            <span>
                                            Semana 10
                                        </span>-->
                                    </div>
                                
                                    <div v-for="modulo in curso.curso.modulos" :key="modulo.id" >
                                        <div v-for="clase in modulo.clases" :key="clase.id">
                                                     <div class="col-12 p-1 mt-1">
                                                        <span>
                                                            Actividades de esta semana
                                                        </span>
                                                    </div>
                                                    <div  class="col-12 p-1 mt-1 d-flex justify-content-between overflow-auto">
                                                             <div v-for="act in clase.actividades" :key="act.id" class="text-center mx-2">
                                                                <p class="mb-2 h5 color-plomo">{{act.tipo}}</p>
                                                                <svg width="56" height="56"  viewBox="0 0 250 250">
                                                                    <image width="100%" height="100%" :xlink:href="act.icom"/>
                                                                    
                                                                </svg>
                                                            
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
    </div>
</template>

<script>
import ProgesoCard from './progresoCard';
import PerfilCard from './perfilCard';
    export default {
        name:"cursos-detalle-padre",
        props:['perfil'],
        data() {
            return {
                miscursostotales:[],
            }
        },
        components: {
            ProgesoCard,PerfilCard
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
    .container {
        margin : 20px auto;
        display : grid;
        grid-template-columns : repeat(3, 1fr);
        grid-auto-rows : minmax(100px, auto);
        grid-template-areas : 
        "perfil perfil perfil"
        "actividades actividades actividades"
        "contenido contenido contenido";
    }
    @media (min-width:768px) {
        .container {
            display : grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: minmax(100px, auto);
            grid-gap: 15px;
            grid-template-areas : 
            "perfil perfil actividades"
            "contenido contenido actividades"
            "contenido contenido actividades";
        }
    }
    .perfil {
        grid-area : perfil;
    }
    .actividades {
        grid-area : actividades;
    }
    .contenido {
        grid-area : contenido;
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
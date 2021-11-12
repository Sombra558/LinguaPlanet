<template>
    <div class="container">
        <div class="perfiles px-lg-4 mt-4">
            <div class="col-12">
                <div class="mb-3">
                    <a href="/home/detalles-avances/cursos">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 16H5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 7L5 16L14 25" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <span class="h4 bold ml-4">Progreso</span>
                </div>
                <button v-for="estudiante in user.perfiles" :key="estudiante.id" class="btn gray-back px-3 py-2 mr-3 mb-2" @click.prevent="seleccionarPerfil(estudiante) " style="border-radius : 50px;">
                    <span class="h5">{{estudiante.apodo}}</span>
                </button>                    
            </div>
        </div>
        <div v-if="perfilSelected" class="progreso px-lg-4">
            <div class="col-12">
                <div class="row mt-3">
                    <div class="col-6 col-md-4 my-2 d-flex align-items-center">
                        <div class="dropdown">
                            <span class="l-select dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img v-if="paisSelected!='Seleccione'" :src="paisSelected.src" class="flag-language">
                                {{ paisSelected.idioma }}
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li @click="paisSelected = 'Seleccione'" class="dropdown-item" href="#">
                                    Seleccione
                                </li>
                               <!--idiomas-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-2 d-flex align-items-center">
                        <div class="dropdown" style="display : relative;">
                            <span class="l-select months dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{mesSelected != 'Seleccione' ? meses[mesSelected] : 'Seleccione'  }}
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li @click="mesSelected = 'Seleccione'" class="dropdown-item" href="#">
                                    Seleccione
                                </li>
                                <li v-for="(mes , i) in meses" @click="mesSelected = i" :key="i" class="dropdown-item" href="#">
                                    {{ mes }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-2 ml-auto text-md-right">
                        <button class="btn d-block d-md-inline gray-back">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.25 7.5L9.75 3L5.25 7.5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.75 21C16.3631 21 14.0739 20.0518 12.386 18.364C10.6982 16.6761 9.75 14.3869 9.75 12V3" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="h5">Exportar</span>
                        </button>
                    </div>
                </div>
                <div  v-for="curso in filteredCursos" :key="curso.id" class="row mt-3">
                    
                    <div class="col-12">
                       
                        <div class="card gray-back">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-2">
                                        <div class="progress mx-auto" data-value='50'>
                                            <span class="progress-left">
                                                <span class="progress-bar border-warning"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar border-warning"></span>
                                            </span>
                                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                <div class="h2 font-weight-bold">
                                                    <svg width="47" height="52" viewBox="0 0 47 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M35.5176 0.0611203C35.1573 0.205662 35.1369 0.476563 35.0852 5.81739L35.0342 11.0826L31.9736 12.7403C30.2903 13.652 28.8785 14.3767 28.8364 14.3507C28.7942 14.3248 28.7597 14.2371 28.7597 14.1557C28.7597 13.8588 27.5451 11.6147 27.2134 11.2989C26.4089 10.5325 25.4238 10.4288 24.2446 10.9862C22.9466 11.6 22.3356 12.5063 22.4682 13.6212C22.5431 14.2511 23.6647 16.4454 24.1112 16.8358L24.4288 17.1134L24.1566 17.6558C23.7595 18.4468 23.311 20.029 23.3924 20.3516C23.4345 20.5187 23.5876 20.6798 23.8003 20.7807C24.0946 20.9205 24.1807 20.9236 24.4352 20.8032C24.6785 20.6882 24.7708 20.5314 24.9655 19.9022C25.3677 18.603 25.5131 18.2597 25.7892 17.9586C25.9414 17.7925 28.1814 16.5191 31.0042 14.9939C36.3958 12.0807 36.199 12.1533 35.8475 13.2069C35.5246 14.1746 34.9899 14.5904 30.9532 17.013C28.9331 18.2254 27.223 19.2887 27.1528 19.3761C27.0827 19.4633 27.0253 19.6827 27.0253 19.8635C27.0253 20.2615 27.4532 20.6526 27.8137 20.584C27.9445 20.5591 28.0424 20.5891 28.0383 20.6528C28.0342 20.7148 27.7473 21.5855 27.4006 22.5876L26.7702 24.4095L25.092 25.0983C24.169 25.4771 23.3961 25.7693 23.3743 25.7476C23.3524 25.7258 23.5066 25.0871 23.7168 24.3283C24.0356 23.1769 24.0795 22.9061 23.9819 22.693C23.7578 22.2032 22.9772 22.1354 22.6926 22.5811C22.6167 22.6999 22.2935 23.7113 21.9744 24.8286C21.3427 27.0404 21.3552 26.9413 21.1203 31.5834L21.0254 33.4625L19.3697 36.9161C18.4591 38.8155 17.6686 40.4268 17.6131 40.4966C17.5405 40.5878 17.0906 40.6236 16.0143 40.6236C14.6071 40.6236 14.4843 40.6395 13.9861 40.8867C12.8706 41.4401 12.5379 42.1767 12.5379 44.0927V45.3925L12.2762 45.2935C12.1235 45.2357 10.4645 45.1945 8.294 45.1945C4.14969 45.1945 4.14449 45.1952 3.42012 45.8851C2.72544 46.5466 2.64637 46.841 2.64382 48.775L2.64158 50.4764H1.56574C0.559372 50.4764 0.473569 50.4925 0.239425 50.7257C-0.0798082 51.0435 -0.0798082 51.4329 0.239425 51.7506L0.489791 52H23.33H46.1702L46.3921 51.765C46.6867 51.4526 46.6804 50.9803 46.3778 50.6972C46.1643 50.4976 46.0317 50.4764 45.0005 50.4764H43.8592V40.3388V30.2012L43.595 29.6733C43.4496 29.3828 43.1653 29.0095 42.963 28.8435C42.285 28.2871 41.9378 28.2314 39.148 28.2314H36.6155V21.6546V15.0777L37.0229 14.265C37.5054 13.3024 37.6709 12.4198 37.5399 11.5074C37.4268 10.7204 37.3096 10.5041 36.9237 10.3701C36.6231 10.2658 36.6155 10.2468 36.6155 9.59761V8.93209H41.3119C46.5667 8.93209 46.5462 8.93453 46.8631 8.26972C47.1832 7.59821 47.0084 7.29622 45.5939 6.07691C44.6618 5.27345 44.4016 4.99717 44.5041 4.91987C44.5782 4.864 45.1288 4.39026 45.7278 3.86704C46.977 2.77582 47.1737 2.42488 46.8807 1.81014C46.5618 1.14117 46.7499 1.16453 41.4362 1.13243L36.6155 1.10328V0.769201C36.6155 0.21521 36.0473 -0.151274 35.5176 0.0611203ZM44.6754 2.736C44.6754 2.79187 44.641 2.83839 44.5989 2.8393C44.5568 2.84032 44.1169 3.21737 43.6214 3.6773C42.8081 4.43221 42.7148 4.55694 42.6623 4.95979L42.6041 5.40601L43.6653 6.40795L44.7264 7.40999L40.6965 7.38378L36.6665 7.35768L36.639 5.12546C36.6238 3.89772 36.6339 2.83494 36.6612 2.76383C36.7248 2.59898 44.6754 2.57145 44.6754 2.736ZM26.2021 12.4506C26.5329 12.8694 27.3314 14.4886 27.3314 14.7408C27.3314 15.1028 27.0669 15.4085 26.5115 15.6887C25.9495 15.9722 25.5344 16.0082 25.2371 15.7994C25.1264 15.7217 24.7882 15.1567 24.4855 14.5441C23.8588 13.2755 23.852 13.0668 24.4243 12.6323C25.1593 12.0741 25.8489 12.0036 26.2021 12.4506ZM35.0852 22.2892V28.2314L34.8046 28.2324C34.4005 28.2338 33.5572 28.6538 33.1769 29.0431C32.5008 29.7352 32.4867 29.812 32.4536 32.98C32.437 34.5582 32.3911 35.8492 32.3515 35.8489C32.312 35.8486 32.1088 35.8012 31.9003 35.7435C31.5616 35.6498 31.5262 35.6092 31.5697 35.3632C31.7182 34.5249 32.1377 30.8386 32.14 30.3518C32.1441 29.5136 31.8667 29.0633 29.9476 26.7932L28.2595 24.7963L29.1784 22.0537L30.0973 19.3111L32.0046 18.1647C33.0536 17.5342 34.1414 16.8696 34.422 16.6879C34.7026 16.5061 34.9665 16.355 35.0086 16.3523C35.0508 16.3494 35.0852 19.0211 35.0852 22.2892ZM25.7435 29.8609C25.1859 32.888 25.0403 33.5175 24.828 33.8172C24.6892 34.0132 23.4855 35.6134 22.1531 37.3732C20.0313 40.1756 19.3735 40.9245 19.3735 40.5377C19.3735 40.4823 20.0643 38.9897 20.9085 37.2211C22.6717 33.5272 22.5419 34.0366 22.7466 30.009C22.8119 28.724 22.8945 27.659 22.9304 27.6422C23.2374 27.4979 26.3672 26.2311 26.3843 26.2441C26.3965 26.2533 26.1081 27.881 25.7435 29.8609ZM29.1214 28.186C30.5167 29.8383 30.5961 29.9614 30.5961 30.4728C30.5961 30.8585 30.174 34.4755 30.0309 35.3163C29.9854 35.5838 29.9272 35.6464 29.7243 35.6464C29.5866 35.6464 29.4725 35.6349 29.4709 35.621C29.4692 35.6071 29.3617 34.5671 29.2321 33.3102C29.0683 31.7221 28.9425 30.9214 28.82 30.6861C28.7135 30.4816 28.3891 30.186 28.0012 29.9398L27.3589 29.5321L27.4864 28.8563C27.5565 28.4847 27.6708 27.8404 27.7403 27.4247C27.8402 26.8258 27.8904 26.7002 27.9816 26.8206C28.0448 26.9041 28.5577 27.5185 29.1214 28.186ZM41.749 29.8685C41.8715 29.9308 42.0511 30.0795 42.1481 30.1986C42.3123 30.4005 42.3245 31.0954 42.3266 40.4458L42.3289 50.4764H38.1459H33.9629V48.1334C33.9629 45.3701 33.917 45.1995 33.1722 45.196C32.975 45.1951 32.758 45.2767 32.6366 45.3976C32.4439 45.5895 32.4325 45.7362 32.4325 48.0386V50.4764H28.1949H23.9572L23.9864 44.2041C24.0184 37.3165 23.9884 37.6312 24.6422 37.3224C25.1222 37.0956 31.3828 37.0971 31.8238 37.3241C32.3811 37.6111 32.4325 37.8553 32.4325 40.2169C32.4325 42.3564 32.433 42.36 32.683 42.6089C32.8207 42.746 33.0523 42.8582 33.1977 42.8582C33.3431 42.8582 33.5747 42.746 33.7124 42.6089L33.9629 42.3596V36.4026V30.4457L34.3098 30.1004L34.6567 29.755H38.0914C40.4201 29.755 41.5979 29.7916 41.749 29.8685ZM27.3434 31.3086C27.4725 31.4065 27.5532 31.8872 27.7139 33.5147C27.827 34.6592 27.9082 35.6085 27.8942 35.6242C27.8803 35.64 27.3147 35.64 26.6373 35.6242L25.4057 35.5956L25.903 34.9354C26.4417 34.2202 26.6012 33.7703 26.8838 32.1674C26.9799 31.6227 27.0854 31.1785 27.1183 31.1803C27.1514 31.1821 27.2526 31.2398 27.3434 31.3086ZM22.4342 40.1745V40.7413L22.1026 40.6706C21.9203 40.6317 21.7547 40.5851 21.7347 40.5671C21.6975 40.5335 22.3398 39.6078 22.4005 39.6078C22.419 39.6078 22.4342 39.8629 22.4342 40.1745ZM22.136 42.4441L22.4342 42.741V46.6087V50.4764H18.2512H14.0683V46.7114C14.0683 42.7951 14.0803 42.6768 14.5138 42.3272C14.7105 42.1685 15.0721 42.1515 18.2846 42.1494L21.8378 42.1472L22.136 42.4441ZM12.0334 46.8227C12.4465 47.0427 12.5379 47.4371 12.5379 48.9985V50.4764H8.35491H4.17193V48.8941V47.3119L4.47015 47.015L4.76837 46.7181H8.30278C10.5318 46.7181 11.9096 46.7567 12.0334 46.8227Z" fill="#31348B"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-10">
                                        
                                        <div class="row align-items-center h-100">
                                            <div class="item-progress text-md-center text-lg-left col-12 col-md-6 col-lg-3">
                                                <h5 class="bold text-primary">{{curso.titulo}} Completado</h5>
                                                <span class="h4">{{curso.progreso}}%</span>
                                            </div>
                                            <div class="item-progress text-md-center text-lg-left col-12 col-md-6 col-lg-3">
                                                <h5 class="bold text-primary">Lecciones</h5>
                                                <span class="h4">{{curso.lecciones}}</span>
                                            </div>
                                            <div class="item-progress text-md-center text-lg-left col-12 col-md-6 col-lg-3">
                                                <h5 class="bold text-primary">Juegos Ganados</h5>
                                                <span class="h4">0</span>
                                            </div>
                                            <div class="item-progress text-md-center text-lg-left col-12 col-md-6 col-lg-3">
                                                <h5 class="bold text-primary">Calificación promedio</h5>
                                                <span class="h4">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                                 <div  v-if="perfilSelected" class="resultados px-lg-4">
            <div class="col-12">
                <div class="row mt-3">
                    <div class="col-12 mb-3 px-4">
                        <span class="h4 bold">Resultados</span>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <ul v-if="curso.modulos.length>0" class="list-group list-group-flush flex-grow-1">
                                <li class="list-group-item d-none py-1 color-plomo d-md-flex justify-content-between align-items-center">
                                    <span class="col-4 h6 bold">Fecha</span>
                                    <span class="col-4 h6 bold">Actividades Completadas</span>
                                     <span class="col-2 h6 bold">Progreso Semanal</span>
                                    <span class="col-2 h6 bold text-center">Calificación</span>
                                </li>
                                
                                <li v-for="modulo in curso.modulos" :key="modulo.id" class="list-group-item py-1" >
                                        <span v-for="cla  in modulo.clases" :key="cla.id" class="list-group-item py-1">
                                            <div class="row justify-content-between align-items-center">
                                                <span class="col-12 col-md-4">Semana {{ cla.indice }}</span>
                                                <div class="col-9 col-md-4">
                                                    <span v-for="actividad in cla.actividades" :key="actividad.id" class="mr-4">
                                                    
                                                       <svg v-if="perfilSelected.misactividades.some(evt => evt.pivot.actividad_id===actividad.id)" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="26" height="26" rx="13" fill="#00A53F"/>
                                                            <path d="M19.6666 8L10.4999 17.1667L6.33325 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                      
                                                        <svg  v-else width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="26" height="26" rx="13" fill="#B5B5BB"/>
                                                            <path d="M19.6668 8L10.5002 17.1667L6.3335 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <Progreso :clase="cla" :actividades="perfilSelected.misactividades" />
                                                <Calificacion :clase="cla" :actividades="perfilSelected.misactividades" />
                                            </div>
                                        </span>
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
</template>

<script>
import ProgesoCard from './progresoCard';
import PerfilCard from './perfilCard';
import Progreso from './progreSemanal.vue'
import Calificacion from './CalificacionSemanal.vue';
import { mapGetters } from "vuex";
    export default {
        name:"cursos-detalle-padre",
        props:['user'],
        data() {
            return {
                paisSelected : 'Seleccione',
                mesSelected : 'Seleccione',  
                perfilSelected: null,
                perfilcursosgenerales:[],
                idiomasg:[],
                meses:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','diciembre']

            }            
        },
        components: {
            ProgesoCard,PerfilCard,Progreso ,Calificacion
        },
        mounted() {
            var value = $(".progress").attr('data-value');
            var left = $(".progress").find('.progress-left .progress-bar');
            var right = $(".progress").find('.progress-right .progress-bar');
                
            if (value > 0) {
              if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
              } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
              }
            }

            function percentageToDegrees(percentage) {
                return percentage / 100 * 360;
            }
        },
        computed: {
            ...mapGetters(["filteredCursos"]),
        },
        methods: {
            seleccionarPerfil(value) {
                var self=this;
                self.perfilcursosgenerales=[],
                self.$store.commit("setCursos", self.perfilcursosgenerales);
                self.perfilSelected=value;
                self.perfilSelected.planes.forEach(plan => {
                    if (self.idiomasg.length>0) {
                            if (self.idiomasg.some(evt => evt.id === plan.plan.membresia.idioma.id)!=true) {
                                self.idiomasS.push(plan.plan.membresia.idioma);
                            }
                    }else{
                          self.idiomasg.push(plan.plan.membresia.idioma);
                    }
                    
                    
                    plan.plan.membresia.cursos.forEach(curso => {
                        var tempro = 0;
                        var temact =0;
                        curso.progresos.forEach(prog => {
                             if (prog.perfil_id === self.perfilSelected.id) {
                                 tempro=prog.progreso*100;
                             }
                        });
                        curso.modulos.forEach(mod => {
                             mod.clases.forEach(clas=> {
                                 clas.actividades.forEach(activi => {
                                      if (self.perfilSelected.misactividades.some(evt => evt.id === activi.id)) {
                                            temact++;
                                      }
                                 });
                             });
                             
                            
                        });
                        var curtemp={
                            modulos:curso.modulos,
                            progreso:tempro,
                            lecciones:temact,
                            titulo:curso.titulo,
                        }
                        self.perfilcursosgenerales.push(curtemp);
                    });
                });
                self.$store.commit("setCursos", self.perfilcursosgenerales);
            }
        },
    }
</script>

<style scoped>
    
    .item-progress {
        padding-left : 25px;
    }

    @media (min-width : 999px) {
        .item-progress:not(:first-child)::before {
            background: #B5B5BB;
            content: "";
            width: 1px;
            height: 60px;
            position: absolute;
            top: 5px;
            left: 0;
        }
    }

    .progress {
      width: 100px;
      height: 100px;
      background: none;
      position: relative;
    }

    .progress::after {
      content: "";
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 9px solid #B5B5BB;
      position: absolute;
      top: 0;
      left: 0;
    }

    .progress>span {
      width: 50%;
      height: 100%;
      overflow: hidden;
      position: absolute;
      top: 0;
      z-index: 1;
    }

    .progress .progress-left {
      left: 0;
    }

    .progress .progress-bar {
      width: 100%;
      height: 100%;
      background: none;
      border-width: 9px;
      border-style: solid;
      position: absolute;
      top: 0;
    }

    .progress .progress-left .progress-bar {
      left: 100%;
      border-top-right-radius: 80px;
      border-bottom-right-radius: 80px;
      border-left: 0;
      -webkit-transform-origin: center left;
      transform-origin: center left;
    }

    .progress .progress-right {
      right: 0;
    }

    .progress .progress-right .progress-bar {
      left: -100%;
      border-top-left-radius: 80px;
      border-bottom-left-radius: 80px;
      border-right: 0;
      -webkit-transform-origin: center right;
      transform-origin: center right;
    }

    .progress .progress-value {
      position: absolute;
      top: 0;
      left: 0;
    }
    .container {
        margin : 20px auto;
        display : grid;
        grid-template-columns : repeat(3, 1fr);
        grid-auto-rows : minmax(100px, auto);
        grid-template-areas : 
        "perfiles perfiles perfiles"
        "progreso progreso progreso"
        "resultados resultados resultados";
    }
    .perfiles {
        grid-area : perfiles;
    }
    .progreso {
        grid-area : progreso;
    }
    .resultados {
        grid-area : resultados;
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
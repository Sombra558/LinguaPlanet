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
                    <button v-for="perfil in user.perfiles" :key="perfil.id" @click.prevent="seleccionar(perfil)" class="btn gray-back px-3 py-2 mx-2" style="border-radius : 50px;">
                        <span class="h5">{{perfil.apodo}}</span>
                    </button>
                </div>
            </div>            
        </div>
        <div v-if="perfilSelected" class="certificados">
            <div class="row mt-4">
                <div v-for="curso in cursosperfil" :key="curso.id" class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="card card-rounded" style="min-height: 150px;">
                        <span class="m-0 d-flex flex-inline justify-content-between">
                            <h3>{{curso.titulo}}</h3>
                            <svg v-if="perfilSelected.certificados.some(cert => cert.curso_id === curso.id)" @click.prevent="visualizar(perfilSelected.certificados,curso.id)" class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 10L12 15L17 10" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 15V3" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                             <svg v-else @click.prevent="generar(perfilSelected.id,curso.id)" class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 10L12 15L17 10" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 15V3" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="color-plomo">
                            {{curso.created_at}}
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
        data() {
            return {
                perfilSelected: null,
                cursosperfil:[],
            }
        },
        methods: {
            seleccionar(value) {
                this.cursosperfil=[];
                this.perfilSelected=value;
                this.perfilSelected.planes.forEach(plan => {
                    plan.plan.membresia.cursos.forEach(curso => {
                        this.cursosperfil.push(curso);
                    });
                });
            },
            generar(perfil,curso){
                console.log(perfil+'-'+curso);
                var url = '/home/generar-certificado';
                axios.post(url,{
                    perfil_id:perfil,
                    curso_id:curso,
                }).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
            visualizar(certificados,curso){
                var codigo = null;
                certificados.some(cert => {
                    if (cert.curso_id === curso) {
                        codigo=cert.codigo;
                    }
                })
                if (codigo) {
                    var url ='/home/mi-certificado-descargar/'+codigo+'/'+curso;
                     window.open(url, '_blank');
                      
                }
                
                
            },
        },
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
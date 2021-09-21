<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 v-if="user.perfiles.length>0" class="bold mt-4">¿Cómo quieres ingresar?</h2>
                <h3 v-else class="bold mt-4">Crea un perfil de estudiante</h3>
            </div>
        </div>
        <div v-if="user.perfiles.length>0" class="row mt-5 justify-content-md-center">
            <div class="col-6 col-md-3 d-flex justify-content-center" v-for="perf in user.perfiles" :key="perf.id">
                <PerfilCard  :mode="selectMode"  :key="perf.id" :perfil="perf" />
            </div>
            <div class="col-6 col-md-3">
                <div @click.prevent="crear()" class="card-body" style="height: 150px; background-image : url(images/add-gray.svg); background-repeat: no-repeat; background-position : center center;">
                  
                </div>                        
            </div>
        </div>
        <div v-else class="row">
            <div class="col-12 text-center mt-5 divAdd-profile">
                <a href="/home/perfil-user/create">
                    <img class="iz-15" src="/images/add.svg">
                </a>
            </div> 
        </div>
        <div v-if="user.perfiles.length>0" class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-5 text-center divEdit-profile">
                <button v-if="!selectMode" @click="editMode" class="btn btn-outline-secondary px-4">
                    <span class="h5">
                        Editar perfiles
                    </span>
                </button>
                <button v-else @click="editMode" class="btn btn-outline-secondary">Cancelar</button>
            </div>
        </div>
    </div>
</template>

<script>
import PerfilCard from './perfilCard';
    export default {
        name:"myperfiles-component",
        props:['user'],
        components: {
            PerfilCard,
        },
        mounted () {
            var url="http://165.22.27.174/rompecabeza/1";
                const axiosInstance = axios.create({
                headers: {
                    "Access-Control-Allow-Origin": "*"
                }
                });

                axiosInstance
                .get(url)
                .then(response => {
                    console.log(response);
                })
                .catch(e => console.log(e));

            
        },
        data() {
            return {
                selectMode : false,
            }
        },
        methods : {
            editMode : function() {
                this.selectMode = !this.selectMode;
                document.querySelectorAll('.card-perfil .card-backdrop')
                        .forEach((e) => {
                          e.classList.toggle('show');  
                        })
            },
             crear() {
                window.location='/home/perfil-user/create';
            }
        }
    }
</script>

<style lang="scss" scoped>
    .divEdit-profile {
        background-repeat: no-repeat;
        background-position: center center;
    }
</style>
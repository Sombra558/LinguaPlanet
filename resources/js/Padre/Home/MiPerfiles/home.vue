<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 v-if="user.perfiles.length>0" class="bold mt-4">¿Como quieres ingresar?</h2>
                <h3 v-else class="bold mt-4">Crea un perfil de estudiante</h3>
            </div>
        </div>
        <div v-if="user.perfiles.length>0" class="row mt-5 justify-content-md-center">
            <PerfilCard v-for="perf in user.perfiles" :mode="selectMode"  :key="perf.id" :perfil="perf" />
            <div class="w-50 col-sm-6 col-md-3 col-lg-2">
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
            <div class="col-sm-12 col-md-12 col-lg-5 text-center mt-3 divEdit-profile">
                <button v-if="!selectMode" @click="editMode" class="btn btn-outline-secondary">
                    <span class="h3">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.8895 0.791016H5.9807C2.76605 0.791016 0.750488 3.06279 0.750488 6.27896V14.9549C0.750488 18.1711 2.75664 20.4429 5.9807 20.4429H15.2054C18.4305 20.4429 20.4367 18.1711 20.4367 14.9549V10.7516" stroke="#606060" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.1039 9.2762L14.9163 1.47787C15.8896 0.507378 17.4671 0.507378 18.4404 1.47787L19.7126 2.74785C20.6859 3.71938 20.6859 5.29511 19.7126 6.2656L11.8626 14.1015C11.4371 14.5262 10.8601 14.7652 10.2579 14.7652H6.3418L6.44007 10.8206C6.4547 10.2404 6.69201 9.68735 7.1039 9.2762Z" stroke="#606060" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.7295 2.68262L18.5029 7.44739" stroke="#606060" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
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
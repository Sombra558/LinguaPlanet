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
               <!-- <div @click="enviar()">enviar</div>-->                       
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
            },
            enviar(){
                fetch("http://167.172.162.54/game/2/81/actividad/561/intentos/0/realizada", {
                    mode: 'no-cors',
                    headers: {
                        'csrf-token': 'ZdXvLAvP33hfxzuxKHay8QtbQmaD4YTm482BT9gD',
                    },
                    method: "POST",
                    body: JSON.stringify({
                    "nombre": "Luis",
                    "web": "parzibyte.me"
                    })
                })
                .then(r => r.json())
                .then(respuesta => {
                console.log(respuesta);
                });
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
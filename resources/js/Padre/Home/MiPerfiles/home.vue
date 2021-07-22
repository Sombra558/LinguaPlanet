<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 v-if="user.perfiles.length>0" class="bold mt-4">Como quieres ingresar</h3>
                <h3 v-else class="bold mt-4">Crea un perfil de estudiante</h3>
            </div>
        </div>
        <div v-if="user.perfiles.length>0" class="row d-flex align-items-center pt-5">
             <div class="col-12 text-center mt-5" v-for="perf in user.perfiles" :key="perf.id">
                    <PerfilCard :perfil="perf" />
             </div>
            <div class="col-12 text-center mt-5 divAdd-profile">
                <a href="/home/perfil-user/create">
                    <img class="iz-35" src="storage/images/add.svg">
                </a>
            </div>
        </div>
        <div v-else class="row">
            <div class="col-12 text-center mt-5 divAdd-profile">
                <a href="/home/perfil-user/create">
                    <img class="iz-35" src="storage/images/add.svg">
                </a>
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
    }
</script>

<style lang="scss" scoped>

</style>
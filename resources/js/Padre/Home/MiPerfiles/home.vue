<template>
    <div>
         <h2 v-if="user.perfiles.length>0">Como quieres ingresar</h2>
         <h2 v-else>Crea un perfil de estudiante</h2>
        <div class="row">
             <div class="col" v-for="perf in user.perfiles" :key="perf.id">
                    <PerfilCard :perfil="perf" />
             </div>
             <div class="col">
                  <a href="/home/perfil-user/create">+</a>
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
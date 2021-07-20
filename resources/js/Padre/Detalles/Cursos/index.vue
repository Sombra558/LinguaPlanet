<template>
    <div class="row">
        <div class="col-7">
                <h2>Progreso Semanal</h2>
                <div v-for="perfil in user.perfiles" :key="perfil.id">
                    <ProgesoCard :perfil="perfil" />
                </div>
                <h2>Perfiles</h2>
                 <div v-for="(perf,index) in user.perfiles" :key="perf.id+index">
                    <PerfilCard :perfil="perf" />
                </div>
        </div>
         <div class="col-5">
                <h3>{{user.name}} {{user.lastname}}</h3>
                <span>Membresias Activas {{user.planes.length}}</span>
                <a href="/home/certificados">Certificados</a>
                <a href="/home/detalles-avances/cursos">Progreso</a>
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

<style lang="scss" scoped>

</style>
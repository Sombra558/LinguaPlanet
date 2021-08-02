<template>
    <a href="/home/detalles-avance-individual/cursos">
        <div class="card card-perfil mx-2">
            <div class="card-body text-center">
                <div class="profile-bg mx-auto" :style="`background-image : url(/images/${perfil.animal.animal}.svg); background-color: ${perfil.color};`">&nbsp;
                </div>
                <h3 class="mt-2 mb-0 text-dark">{{perfil.apodo}}</h3>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        name:"perfil-card",
        props:['perfil']
    }
</script>

<style scoped>
    .profile-bg {
        background-size: 100% 100%;
        width : 100px;
        height : 100px;
        border-radius : 50px;
    }
    .card-perfil{
        width : 12rem;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>
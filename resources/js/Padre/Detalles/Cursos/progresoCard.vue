<template>
    <div class="card-progreso">
        {{perfil.apodo}}
    </div>
</template>

<script>
    export default {
        props:['perfil'],
        name:"progreso-card-component"
    }
</script>

<style scoped>
    .card-progreso{
        width: 100%;
    }
</style>
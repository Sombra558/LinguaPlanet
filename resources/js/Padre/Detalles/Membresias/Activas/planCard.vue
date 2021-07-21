<template>
    <div class="plan-card">
        <h3>{{plan.nombre}}</h3>
        <strong>${{plan.precio}}</strong>
        <span>{{plan.tipo}}</span>
        <p>{{plan.stock}} perfiles de estudiantes en la plataforma</p>
        <p>Certificado de finalización.</p>
    </div>
</template>

<script>
    export default {
        name:"plan-card",
        props:['plan'],
    }
</script>

<style scoped>
.plan-card{
    height: 150px;
    width: 100%;
}
</style>
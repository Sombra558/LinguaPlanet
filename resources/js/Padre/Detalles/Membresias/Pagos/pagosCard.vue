<template>
    <div style="color : black" class="m-4">
        <h2 class="mb-3 fw-500">{{
            new Date(pago.created_at).toLocaleDateString('es-ES', {year: 'numeric', month: 'long', day: 'numeric' })}}
        </h2>
        <div class="card">
            <div class="card-body row">
                <div class="col-12 col-lg-3">
                    <h3 class="title mb-3">Curso</h3>
                    <ul class="fw-500">
                        <li v-for="curso in pago.membresia.cursos" :key="curso.id">{{curso.titulo}}</li>
                    </ul>
                </div>
                  <div class="col-6 col-md-4 col-lg-3">
                    <h3 class="title mb-3">Precio</h3>
                    <span class="fw-500">$ {{pago.precio}} {{pago.tipo}}</span>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <h3 class="title mb-3">Detalles de pago</h3>
                    <p class="fw-500">
                        Suscribción hasta el {{ new Date(pago.membresia.finaliza).toLocaleDateString('es-ES', {year: 'numeric', month: 'long', day: 'numeric' }) }}
                    </p>
                </div>
                <div class="col-12 col-md-4 col-lg-3 text-center d-flex flex-column">
                    <h3 class="title mb-3">Pago</h3>
                    <span class="fw-500">${{pago.precio}}</span>
                    <h2 class="my-auto">
                        <span class="p-2 fw-500 badge badge-pill badge-success">completado</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"pago-card",
        props:['pago']
    }
</script>

<style  scoped>
    .title { 
        font-size: 1.3rem;
        font-weight: 600;
    }
    .fw-500 {
        font-weight : 500;
    }
    ul {
        list-style: none;
        padding-inline-start : 0;
    }
</style>
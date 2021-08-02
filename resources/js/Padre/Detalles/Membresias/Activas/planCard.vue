<template>
    <div class="card plan-card p-0 m-1 col-sm-12 col-md-5 col-lg-5">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a class="color-plomo" :href="`/home/membresia/${plan.id}/editar`">
                    <u>Editar</u>
                </a>                
            </div>
            <h1 class="m-0 text-center">
                <span class="mx-auto badge badge-pill badge-primary">
                    {{plan.nombre}}
                </span>
            </h1>
            <p class="price py-4 text-center">
                <strong class="h3">${{plan.precio}}</strong>
                <span class="h5 color-gray d-block">{{plan.tipo}}</span>
            </p>
            <ul>
                <li>
                    <p>{{plan.stock}} perfiles de estudiantes en la plataforma</p>
                </li>
                <li>
                    <p>Certificado de finalización.</p>
                </li>
            </ul>
        </div>
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
        min-height: 250px;
    }
    .price { 
        position : relative;
    }
    .price::after {
        content: "";
        background: #B5B5BB;
        position: absolute;
        bottom: 0;
        left: 30px;
        height: 1px;
        width: 80%;
    }
</style>
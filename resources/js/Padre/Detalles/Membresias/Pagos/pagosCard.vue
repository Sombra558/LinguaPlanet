<template>
    <div>
        <h2>{{pago.created_at}}</h2>
        <div class="row">
            <div class="col">
                <h3>Cursos</h3>
                <ul>
                    <li v-for="curso in pago.membresia.cursos" :key="curso.id">{{curso.titulo}}</li>
                </ul>
            </div>
              <div class="col">
                <h3>Precio</h3>
                <span>${{pago.precio}}</span>
            </div>
            <div class="col">
                <h3>detalles de pago</h3>
                <p>Suscribción hasta el {{pago.membresia.finaliza}}</p>
            </div>
             <div class="col">
                <h3>Pago</h3>
                   <span>${{pago.precio}}</span>
                   completado
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

</style>
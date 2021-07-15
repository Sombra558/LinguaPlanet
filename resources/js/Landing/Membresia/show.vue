<template>
    <div>
        <h2>Enseñamos idiomas a través del juego ¿Qué esperas para que tus hijos inicien?</h2>
        <div class="row">
            <div class="col-3">

                <h3>{{membresia.nombre}}</h3>
                <span>Selecciona tu plan y comienza aprender.</span>
                <span>Aceptamos múltiples métodos de pago.</span>
            </div>
            <div class="col-9 row">
                <div v-for="plan in membresia.planes" :key="plan.id" class="col">
                    <h4>{{plan.nombre}}</h4>
                    <span>{{plan.precio}}</span>
                    <strong>{{plan.tipo}}</strong>

                    <ul>
                        <li>{{plan.stock}} <span v-if="plan.stock===1">perfil </span> <span v-else>perfiles </span>  de estudiante en la plataforma.</li>
                    
                        <li>Certificado de finalización.</li>

                        <li>Clases nuevas semanales.</li>
                    </ul>

                    <a :href="'/comprar/plan/'+plan.nombreURL">Comprar</a>
                </div>   
             </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"menbresua-sow",
        props:['idiomas','membresia']
    }
</script>

<style lang="scss" scoped>

</style>
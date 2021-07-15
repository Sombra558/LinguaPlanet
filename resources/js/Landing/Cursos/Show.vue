<template>
    <div>
        <h2>Un tour por el mundo</h2>
            <div v-for="idio in idiomas" :key="idio.id">
                {{idio.idioma}}
            </div>
            <a href="/cursos">Regresar</a>

        <div>
              <iframe  width="300"
                                height="300" :src="idioma.video + '?autoplay=1'"
                            webkitallowfullscreen mozallowfullscreen allowfullscreen
                            autoplay="1"></iframe>
        </div>
        <h2>Tus hijos aprenden francés con lingua planet</h2>

        <div v-for="membresia in idioma.membresias" :key="membresia.id">
            <div>
                <h3>{{membresia.nombre}}</h3>
                <div>
                    {{membresia.tipo}}
                </div>
                <a :href="'/membresia/'+membresia.nombreURL">Comprar</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"curso-show-component",
        props:["idioma","idiomas"]
    }
</script>

<style lang="scss" scoped>

</style>
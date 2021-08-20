<template>
    <div>
        <a v-for="curso in cursos" :key="curso.id" :href="'/home/app/'+perfil.id+'/'+perfil.apodo+'/idiomas/'+idioma.nombreURL+'/'+curso.id">{{curso.titulo}}</a>
    </div>
</template>

<script>
    export default {
        name:"lista-cursos-component",
        props:['cursos','perfil','idioma'],
    }
</script>

<style lang="scss" scoped>

</style>
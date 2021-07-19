<template>
    <div>
       <h2>Explora  y aprende del mundo con Lingua Planet  </h2>
       
        <div v-for="idioma in idiomas" :key="idioma.id">
             <a :href="'/cursos/'+$idioma.nombreURL">{{idioma.idioma}}</a>
        </div>
               

    </div>
</template>

<script>
    export default {
        name:"cursos-component",
        props:['idiomas'],
    }
</script>

<style lang="scss" scoped>

</style>
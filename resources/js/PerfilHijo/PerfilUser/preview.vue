<template>
    <div>
        {{perfil.animal.animal}}

            <a :href="'/home/app/'+perfil.id+'/'+perfil.apodo+'/idiomas'">Mundo</a>
    </div>
    
</template>

<script>
    export default {
        name:"preview-perfiluser",
        props:["perfil"],
    }
</script>

<style lang="scss" scoped>

</style>
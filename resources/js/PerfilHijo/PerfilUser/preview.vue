<template>
    <div class="flex-fill" style="position : relative;">
        <img style="position : absolute; top : 20%; left : 15%;" :src="`/images/${perfil.animal.animal}-character.svg`">
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
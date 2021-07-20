<template>
        <div>
            <div class="card-perfil" :style="'background-color:'+perfil.color+';'">
                {{perfil.animal.animal}}
            </div>
            {{perfil.apodo}}
        </div>
</template>

<script>
    export default {
        name:"perfil-card-component",
        props:['perfil']
    }
</script>

<style  scoped>
.card-perfil{
    height: 150px;
    width: 100%;
}
</style>
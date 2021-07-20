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
        name:"perfil-card",
        props:['perfil']
    }
</script>

<style scoped>
.card-perfil{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150px;
    width: 150px;
    border-radius: 50%;
}
</style>
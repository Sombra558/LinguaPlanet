<template>
    <div @click.prevent="mode ? editar() : entrar()" class="card-perfil w-100">
        <div class="card-body p-2 d-flex justify-content-center align-items-center" :style="`background-color:${perfil.color};`">
            <div class="card-backdrop"></div>
            <caraAvatar class="w-75 h-75" viewBox="0 0 250 250" :perfil="perfil"/>
        </div>
        <center class="mt-3">
            <span style="font-size: 1.3rem;" class="bold">{{perfil.apodo}}</span>    
        </center>        
    </div>
</template>

<script>
    import caraAvatar from '../../../PerfilHijo/PerfilUser/caraAvatar';
    export default {
        name:"perfil-card-component",
        props:['perfil','mode'],
        components : {
            caraAvatar
        },
        methods: {
            entrar() {
                window.location='/home/app/'+this.perfil.id;
            },
            editar(){
                window.location=`/home/perfil-user/${this.perfil.id}/edit`;
            }
        },
    }
</script>

<style scoped>

.card-perfil{
    width: 50%;
    border : none;
}

.card-perfil .card-body {
    position: relative;
    border-radius : 12px;
    height : 75%;
}

.card-backdrop.show {
    position : absolute;
    top : 0;
    left : 0;
    width : 100%;
    height : 100%;
    background-image : url('/images/edit-square.svg');
    background-repeat : no-repeat;
    background-size : 100% 20%;
    background-position : center center;
    border-radius : 12px;
    backdrop-filter : contrast(.4);
    transition : backdrop-filter 0.5s;
}

@media (min-width: 768px){
    .w-md-85 {
        width : 85% !important;
    }
}

</style>
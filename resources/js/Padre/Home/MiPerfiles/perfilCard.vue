<template>
    <div @click.prevent="mode ? editar() : entrar()" class="card-perfil col-sm-6 col-md-3 col-lg-2">
        <div class="card-body p-2" :style="`background-color:${perfil.color};`">
            <caraAvatar class="w-100 h-100" viewBox="0 0 250 250" :perfil="perfil"/>
        </div>
        <h2 class="text-center my-3 bold">{{perfil.apodo}}</h2>
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
                window.location='/home/app/'+this.perfil.id+'/'+this.perfil.apodo;
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
    border-radius : 12px;
    height : 150px;
}

.card-backdrop.show {
    position : absolute;
    top : 0;
    left : 15px;
    width : 85%;
    height : 71%;
    background-image : url('/images/edit-square.svg');
    background-repeat : no-repeat;
    background-size : 100% 20%;
    background-position : center center;
    border-radius : 12px;
    backdrop-filter : contrast(.4);
    transition : backdrop-filter 0.5s;
}

</style>
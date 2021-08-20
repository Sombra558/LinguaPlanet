<template>
    <div @click.prevent="mode ? editar() : entrar()" class="card-perfil col-sm-6 col-md-3 col-lg-2">
        <div class="card-body img-profile" :style="`background-color:${perfil.color}; background-image : url(/images/${perfil.animal.animal.toLowerCase()}.svg);`">
            <div class="card-backdrop"></div>
        </div>

        <h2 class="text-center my-3 bold">{{perfil.apodo}}</h2>
    </div>
</template>

<script>
    export default {
        name:"perfil-card-component",
        props:['perfil','mode'],
        methods: {
            entrar() {
                window.location='/home/app/'+this.perfil.id+'/'+this.perfil.apodo;
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

.img-profile {
    background-size : 80%;
    background-repeat : no-repeat;
    background-position: center center;
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
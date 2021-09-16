<template>
    <div class="left-panel container bg-primary">
        <div class="row py-3">
            <div class="col-12 text-right">
                <label class="mb-0" for="check">
                    <button class="toggle-father-details img-btn">
                        <img class="iz-100"  src="/images/exit-icon.svg">
                    </button>                    
                </label>                
            </div>
        </div>                    
        <div class="row panel-content">
            <div class="col-12 text-center">
                <img class="iz-40 mb-4" src="/images/bwhite-lock.svg">
                <h2 class="bold">Solo para adultos</h2>
                <span>Para continuar por favor ingresa</span>
                <div class="my-5">
                    <h2 class="color-yellow mb-4">{{daten1.texto}}, {{daten2.texto}},{{daten3.texto}}</h2>
                    <input class="input-validation-father" v-model="value1" type="text" name="number">
                    <input class="input-validation-father" v-model="value2" type="text" name="number">
                    <input class="input-validation-father" v-model="value3" type="text" name="number">
                </div>
                <button @click.prevent="acceder()" class="btn btn-primary-red"><span class="h4 px-2">Acceder</span></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"block-sidepanel",
        props:['user'],
        data() {
            return {
                selectMode : false,
                
                numeros:[
                     {
                         numero:0,
                         texto:'Cero'
                     },
                     {
                         numero:1,
                         texto:'Uno'
                     },
                     {
                         numero:2,
                         texto:'Dos'
                     },
                     {
                         numero:3,
                         texto:'Tres'
                     },
                     {
                         numero:4,
                         texto:'Cuatro'
                     },
                     {
                         numero:5,
                         texto:'Cinco'
                     },
                     {
                         numero:6,
                         texto:'Seis'
                     },
                     {
                         numero:7,
                         texto:'Siete'
                     },
                     {
                         numero:8,
                         texto:'Ocho'
                     },
                     {
                         numero:9,
                         texto:'Nueve'
                     },
                    ],
                    daten1:null,
                    daten2:null,
                    daten3:null,
                    value1:null,
                    value2:null,
                    value3:null,

            }
        },
        mounted() {
            $('.navbar').on('click', '.toggle-father-details', (e) => {
                $('.backdrop').toggleClass('show');
                $('.left-panel').toggleClass('show');
            });

            $('.left-panel').on('click', '.toggle-father-details', (e) => {
                $('.backdrop').toggleClass('show');
                $('.left-panel').toggleClass('show');
            });
             this.daten1=this.numeros[Math.floor(Math.random() * this.numeros.length)];
             this.daten2=this.numeros[Math.floor(Math.random() * this.numeros.length)];
             this.daten3=this.numeros[Math.floor(Math.random() * this.numeros.length)];
        },
        methods: {
            acceder() {
                if (this.daten1.numero===Number(this.value1) && this.daten2.numero===Number(this.value2) && this.daten3.numero===Number(this.value3)) {
                    window.location='/home/detalles-avances/cursos';
                }
            }
        },
    }
</script>

<style lang="scss" scoped>
    .left-panel.show {
        left : 0;
    }

    .panel-content {
        height : 80%;
        display : flex;
        align-items : center;
        justify-content : center;
        color : white;
    }

    .input-validation-father {
        width: 20%;
        margin: 0 0.5rem 0 0.5rem;
        padding: 0.6rem 0.55rem;
        background: #FFFFFF;
        border: 1px solid #31348B;
        box-sizing: border-box;
        border-radius: 12px;
    }
</style>
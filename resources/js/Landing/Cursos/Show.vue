<template>
    <div class="col-12 text-center d-flex flex-column justify-content-center">
        <h1 class="m-0">Un tour por el mundo</h1>
        <div class="d-flex justify-content-center my-4">
            <a class="mx-1" v-for="idio in idiomas" :href="`/cursos/${idio.nombreURL}`">
                <img :class="[ 'mini-flag-img iz-100', idio.diminutivo === idioma.diminutivo ? 'active' : null ]" :src="idio.src" :key="'lang'+idio.id">
            </a>
        </div>
        <!-- <a href="/cursos">Regresar</a> -->
        <div class="video-container">
            <iframe
                class="frame-video"
                :src="idioma.video + '?autoplay=1'"
                webkitallowfullscreen mozallowfullscreen allowfullscreen
                autoplay="1"
            >
            </iframe>
        </div>
        <h1 class="course-show-header mb-4">Tus hijos aprenden {{ idioma.idioma }} con lingua planet</h1>
        <!-- Carousel movil -->
        <div id="carouselMIndicators" class="carousel slide mobile-display pt-4" data-ride="false" data-interval="false">
            <ol class="carousel-indicators">
                <li v-for="(membresia, index) in idioma.membresias" data-target="#carouselMIndicators" :data-slide-to="'mCard'+index" :class="{ 'active' : index === 0 }"></li>
            </ol>
            <div class="carousel-inner">
                <div v-for="(membresia, index) in idioma.membresias" :key="'mCard'+index" :class="[ 'carousel-item', index === 0 ? 'active' : null ]">
                    <div class="card card-course-carrousel mx-3">
                        <div class="card-body d-flex flex-column">
                            <img class="flag-img mx-auto" :src="`${idioma.src}`" alt="lingua planet france">
                            <h1 class="mb-0">{{ membresia.nombre }}</h1>
                            <h2>Pago {{ membresia.tipo }}</h2>
                            <div class="mt-5 mb-4">
                                <h3 class="bold">Tendrás acceso a:</h3>
                                <h3>Dashboard de seguimiento</h3>
                                <h3>Clases offline</h3>
                            </div>
                            <a :href="`/membresia/${membresia.nombreURL}`" class="btn btn-buy btn-success"><h1 class="mb-0">Comprar</h1></a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselMIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon carousel-control-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselMIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon carousel-control-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Carousel Web -->
        <div id="carouselWIndicators" class="carousel slide web-display pt-4" data-ride="false" data-interval="false">
            <ol class="web-display carousel-indicators">
                <li v-for="(key, index) in keysArray.filter(e => e % 3 === 0 )" data-target="#carouselWIndicators" :data-slide-to="'wCard'+index" :class="{ 'active' : index === 0 }"></li>
            </ol>
            <div class="carousel-inner">
                <div v-for="(key, index) in keysArray.filter(e => e % 3 === 0 )" :key="'wCard'+index" :class="[ 'carousel-item', index === 0 ? 'active' : null ]">
                    <div class="row justify-content-center">
                        <div v-for="(membresia, index2) in offsetCarousel(key)" class="card card-course-carrousel mx-3" style="width : 15rem;">
                            <div class="card-body d-flex flex-column">
                                <img class="flag-img mx-auto" :src="`${idioma.src}`" :alt="`lingua planet ${idioma.idioma}`">
                                <span class="h3 bold" style="height: 4rem;">{{ membresia.nombre }}</span>
                                <h3>Pago {{ membresia.tipo }}</h3>
                                <div class="mt-4 mb-3 lh">
                                    <span class="h5">Tendrás acceso a:</span>
                                    <h4>Dashboard de seguimiento</h4>
                                    <h4>Clases offline</h4>
                                </div>
                                <a :href="`/membresia/${membresia.nombreURL}`" class="btn btn-buy btn-success mx-auto"><span class="h4 bold mb-0">Comprar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselWIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon carousel-control-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselWIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon carousel-control-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name:"curso-show-component",
        props:["idioma","idiomas"],
        data() {
            return {
                keysArray : Object.keys(this.idioma.membresias)
            }
        },
        methods: {
            offsetCarousel : function(start) {
                return this.idioma.membresias.slice(start, (parseInt(start)+3));
            }
        }
    }
</script>

<style lang="scss" scoped>
    .lh {
        line-height: 4;
    }

    .mini-flag-img {
        opacity: 0.5;
    }

    .mini-flag-img.active {
        opacity: 1;
        width : 5rem;
        border : 3px solid black;
        border-radius : 50px;
    }   

    .card.card-course-carrousel:hover {
        background-color: #31348B;
        transition: background-color 0.3s linear;
    }

    .card.card-course-carrousel:hover div{
        color : white !important;
    }

    .card-body div {
        color : #606060;
    }

    .carousel-indicators {
        position : absolute;
        top : 0%;
        bottom : 100%;
    }

    .carousel-control-icon {
        background-color : #31348B;
        padding : 20px;
        border-radius : 10px;
    }

    .carousel-indicators li {
        background-color : #31348B;
    }
</style>
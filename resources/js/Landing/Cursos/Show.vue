<template>
    <div class="col-12 text-center d-flex flex-column justify-content-center">
        <h1 class="m-0">Un tour por el mundo</h1>
        <div class="d-flex justify-content-center my-4">
            <a v-for="idio in idiomas" :href="`/cursos/${idio.nombreURL}`">
                <img :class="[ 'mx-1 mini-flag-img', idio.diminutivo === idioma.diminutivo ? 'active' : null ]" :src="`/storage/images/${idio.diminutivo}.svg`" :key="'lang'+idio.id">
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
        <div class="card-deck card-deck-courses">
            <div v-for="(membresia, key) in idioma.membresias" class="card card-course-deck mx-3">
                <div class="card-body d-flex flex-column px-1">
                    <img class="flag-img mx-auto" :src="`/storage/images/${idioma.diminutivo}-square.svg`" :alt="`lingua planet ${idioma.idioma}`">
                    <span class="h3 bold">{{ membresia.nombre }}</span>
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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="false" data-interval="false">
          <ol class="carousel-indicators">
            <li v-for="(membresia, key) in idioma.membresias" data-target="#carouselExampleIndicators" :data-slide-to="key" :class="{ 'active' : key === 0 }"></li>
          </ol>
          <div class="carousel-inner">
            <div v-for="(membresia, key) in idioma.membresias" :key="'card'+membresia.id" :class="[ 'carousel-item', key === 0 ? 'active' : null ]">
                <div class="card card-course-carrousel mx-3">
                    <div class="card-body d-flex flex-column">
                        <img class="flag-img mx-auto" :src="`/storage/images/${idioma.diminutivo}-square.svg`" alt="lingua planet france">
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
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
</template>

<script>
    export default {
        name:"curso-show-component",
        props:["idioma","idiomas"]
    }
</script>

<style lang="scss" scoped>
    .lh {
        line-height: 4;
    }
</style>
<template>
    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 mt-5">
                <h2 class="text-center">
                    Edita tu suscripción para el curso de <u>Variable</u>
                </h2>
            </div>
        </div>
        <div v-if="screenWidth > 425" class="web-display">
            <div class="row mt-4">
                <div class="col-12">
                    <div id="carouselWIndicators" class="carousel slide web-display pt-4" data-ride="false" data-interval="false">
                        <div class="carousel-indicators">
                            <ol class="web-display carousel-indicators">
                                <li v-for="(key, index) in keysArray.filter(e => e % limit === 0 )" data-target="#carouselWIndicators" :data-slide-to="'wCard'+index" :class="{ 'active' : index === 0 }"></li>
                            </ol>
                        </div>
                        <div class="carousel-inner">
                            <div v-for="(key, index) in keysArray.filter(e => e % limit === 0 )" :key="'wCard'+index" :class="[ 'carousel-item', index === 0 ? 'active' : null ]">
                                <div class="row justify-content-center">
                                    <div v-for="(planM) in offsetCarousel(key)" :class="[ 'card card-membership-web mx-3', planM.id === plan.id && 'active' ]" style="width : 20rem;">
                                        <div :style="{ 'background-color' : planM.id === plan.id && '#B5B5BB' }" class="card-header border-0 text-center py-3">{{ planM.nombre }}</div>
                                        <div class="card-body px-1 d-flex flex-column text-center">
                                            <span class="price-web">
                                                {{ planM.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                                            </span>
                                            <div>
                                                <h4>
                                                    <span v-if="planM.id === plan.id" class="badge p-2 badge-success">
                                                        Tu suscripción
                                                    </span>
                                                </h4>
                                            </div>
                                            <span class="h4">Pago {{ planM.tipo }}</span>
                                            <ul class="text-left w-80 mx-auto mt-4">
                                                <li class="li-benefits text-secondary"><span class="text-primary bold">1 perfil</span> de estudiante en la plataforma.</li>
                                                <li class="li-benefits text-secondary">Certificado de finalización.</li>
                                                <li class="li-benefits text-secondary">Clases nuevas semanales.</li>
                                            </ul>
                                            <div class="flex-fill d-flex justify-content-center align-items-end">
                                                <a v-if="planM.id !== plan.id" :href="`/comprar/plan/${planM.nombreURL}`" class="btn w-50 py-2 btn-primary">
                                                    <span class="h6 bold mb-0">Actualizar</span>
                                                </a>
                                                <a v-else :href="`/comprar/plan/${planM.nombreURL}`" class="btn w-50 py-2 btn-secondary">
                                                    <span class="h6 bold mb-0">Comprar</span>
                                                </a>
                                            </div>
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
            </div>
        </div>
        <div class="mobile-display">
            <div class="card gray-back">
                <nav class="mt-5">
                  <div class="nav nav-tabs d-flex text-center" id="nav-tab" role="tablist">
                    <a v-for="(planM, key) in membresia.planes" :class="[ 'nav-link flex-fill', planM.id === plan.id && 'show active' ]" :id="`nav-${planM.id}-tab`" data-toggle="tab" :href="`#nav-${planM.id}`" role="tab" :aria-controls="`#nav-${planM.id}`" :aria-selected="key === 0 ? true : false">{{ planM.nombre }}</a>
                  </div>
                </nav>
                <div class="tab-content bg-white" id="nav-tabContent">
                    <div v-for="(planM, key) in membresia.planes" :class="[ 'tab-pane fade', planM.id === plan.id && 'show active' ]" :id="`nav-${planM.id}`" role="tabpanel" :aria-labelledby="`nav-${planM.id}-tab`">
                        <div class="card-membership-mobile text-center">
                            <div class="d-flex flex-column">
                                <span class="price-mobile color-plomo">
                                    {{ planM.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                                </span>
                                <div>
                                    <h4>
                                        <span v-if="planM.id === plan.id" class="badge p-2 badge-success">
                                            Tu suscripción
                                        </span>
                                    </h4>
                                </div>
                                <span class="h5 color-plomo">Pago {{ planM.tipo }}</span>
                                <ul class="text-left w-80 mx-auto">
                                    <li><span class="bold">1 perfil</span> de estudiante en la plataforma.</li>
                                    <li>Certificado de finalización.</li>
                                    <li>Clases nuevas semanales.</li>
                                </ul>
                            </div>
                            <a v-if="planM.id !== plan.id" :href="`/comprar/plan/${planM.nombreURL}`" class="btn w-50 py-2 btn-primary">
                                <span class="h6 bold mb-0">Actualizar</span>                                
                            </a>
                            <a v-else :href="`/comprar/plan/${planM.nombreURL}`" class="btn w-50 py-2 btn-secondary">
                                <span class="h6 bold mb-0">Comprar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <h4 class="fw-500 mb-3"><a href="#">Compara los planes</a></h4>
                <span class="h6"><a class="color-gray" href="#">
                    ¿Quieres cancelar tu suscripción?
                </a></span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"membresia-editar-component",
        props:['plan'],
        data() {
            return {
                membresia : this.plan.membresia,
                keysArray : Object.keys(this.plan.membresia.planes),
                screenWidth : window.innerWidth,
                limit : 3,
            }
        },
        mounted() {
            let thisComponent = this;
            window.onresize = () => thisComponent.screenWidth = window.innerWidth;
        },
        methods: {
            offsetCarousel : function(start) {
                if(this.screenWidth <= 768) this.limit = 1;
                else if(this.screenWidth <= 1024) this.limit = 2;
                else this.limit = 3

                return this.membresia.planes.slice(start, ( parseInt(start) + this.limit ));
            }
        }
    }
</script>

<style lang="scss" scoped>
    a.carousel-control-prev,
    a.carousel-control-next {
        width : 3%;
    }
    .fw-500 {
        font-weight: 500;
    }

    .select-subtitle {
        font-size: 0.8rem;
        font-weight: 500;
        line-height: 20px;
    }

    .card-membership-web {
        background: #FFFFFF;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-membership-web .card-header {
        background-color : #31348B;
        color : white;
        border-radius: 12px 12px 0 0;
        transition: background-color 0.3s linear;
    }

    .card-membership-web:not(.card-membership-web.active):hover .card-header {
        background-color: #FAB500;
        color : #31348B;
    }

    .price-web {
        font-style: normal;
        font-weight: 500;
        font-size: 30px;
        line-height: 48px;
        margin-bottom: 0;
    }

    .price-mobile {
        font-style: normal;
        font-weight: 500;
        font-size: 25px;
        line-height: 48px;
    }

    .card-membership-mobile ul li{
        margin: 15px 0 0 0;
    }

    .membership-details {
        padding: 0;
    }

    .membership-details li {
        list-style: none;
        border-bottom: 1px solid #B5B5BB;
    }

    .membership-details li h4{
        font-size : 1rem;
        font-weight : 500;
    }

    .w-24 {
        width : 24% !important;
    }

    .w-38 {
        width : 38% !important;
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
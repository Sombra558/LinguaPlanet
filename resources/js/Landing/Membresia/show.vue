<template>
    <div class="col">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h2 class="text-center"><span class="membership-span">Enseñamos idiomas</span> a través del juego ¿Qué esperas para que tus hijos inicien?</h2>
            </div>
        </div>
        <div v-if="screenWidth >= 768" class="web-display">
            <div class="row mt-4">
                <div class="col-3">
                    <div class="card h-100 gray-back">
                        <div class="card-body py-5 d-flex flex-column">
                            <div class="col px-0">
                                <span class="mb-2 d-flex flex-column align-items-center justify-content-center">
                                    <article class="text-center">
                                        <img v-for="idioma in membresia.idiomas" class="mx-1 iz-15 mini-flag-img active" :src="`${idioma.src}`"  alt="membresia idioma">
                                    </article>
                                    <h3 class="bold mt-2">{{membresia.nombre}}</h3>
                                </span>
                                <h4 class="px-3 select-subtitle text-center">Selecciona tu membresía y comienza aprender.</h4>
                            </div>
                            <div class="col d-flex flex-column align-items-center justify-content-end px-0 text-center">
                                <span class="d-block mb-2 w-80 span-payment-methods">
                                    Aceptamos múltiples metodos de pago.
                                </span>
                                <article class="mt-2">
                                    <img class="mx-1" src="/images/stripe-logo.svg"  alt="membresia idioma">
                                    <img class="mx-1" src="/images/paypal-logo.svg"  alt="membresia idioma">
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div id="carouselWIndicators" class="carousel slide web-display pt-4" data-ride="false" data-interval="false">
                        <div v-if="false" class="carousel-indicators">
                            <a class="carousel-control-prev" href="#carouselWIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon carousel-control-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <ol class="web-display carousel-indicators">
                                <li v-for="(key, index) in keysArray.filter(e => e % limit === 0 )" data-target="#carouselWIndicators" :data-slide-to="'wCard'+index" :class="{ 'active' : index === 0 }"></li>
                            </ol>
                            <a class="carousel-control-next" href="#carouselWIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon carousel-control-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>                            
                        </div>
                        <div class="carousel-inner">
                            <div v-for="(key, index) in keysArray.filter(e => e % limit === 0 )" :key="'wCard'+index" :class="[ 'carousel-item', index === 0 ? 'active' : null ]">
                                <div class="row justify-content-center">
                                    <div v-for="(plan) in offsetCarousel(key)" class="card card-membership-web mx-3 py-5" style="width : 17rem;">
                                        <div class="card-body px-1 d-flex flex-column text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="badge badge-pill bg-gray text-white px-4">
                                                        <h3 class="m-0">
                                                            {{ plan.nombre }}
                                                        </h3>
                                                    </span>        
                                                </div>                                                
                                            </div>                                            
                                            <span class="mt-3 mb-2 color-plomo">Pago {{ plan.tipo }}</span>
                                            <span class="price-web">
                                                {{ plan.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                                            </span>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <span class="color-plomo fw-500">
                                                        Tendrás acceso a:
                                                    </span>                                      
                                                    <ul class="list-group mx-auto mt-2 color-plomo">
                                                        <li class="li-benefits">Dashboard de seguimiento</li>
                                                        <li class="li-benefits">Clases offline</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a :href="`/comprar/plan/${plan.id}/${plan.nombreURL}`" class="btn px-4 py-2 btn-success mx-auto">
                                                <span class="h5 mb-0">Comprar</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="membership-details text-left mx-auto mt-4">
                         <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Plan</h4></div>
                            <div  v-for="plan in membresia.planes" :key="'descripcion-0-plan-'+plan.id" class="w-38 text-center p-3"><span class="h4 bold">{{plan.nombre}}</span></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Estudiantes con acceso a la plataforma</h4></div>
                            <div  v-for="plan in membresia.planes" :key="'descripcion-plan-'+plan.id" class="w-38 text-center p-3"><span class="h4 bold">{{plan.stock}}</span></div>
                          
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Panel de monitoreo para padres</h4></div>
                          
                            <div  v-for="plan in membresia.planes" :key="'descripcion-1-plan-'+plan.id" class="w-38 text-center p-3"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Clases nuevas semanales</h4></div>
                            <div v-for="plan in membresia.planes" :key="'descripcion-2-plan-'+plan.id" class="w-38 text-center p-3" ><img class="mx-1" src="/images/check.svg"></div>
                          
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Juegos educativos</h4></div>
                            <div v-for="plan in membresia.planes" :key="'descripcion-3-plan-'+plan.id" class="w-38 text-center"><img class="mx-1" src="/images/check.svg"></div>
                            
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Certificado de finalización</h4></div>
                            <div v-for="plan in membresia.planes" :key="'descripcion-4-plan-'+plan.id" class="w-38 text-center"><img class="mx-1" src="/images/check.svg"></div>
                            
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Clases en full HD</h4></div>
                            <div v-for="plan in membresia.planes" :key="'descripcion-5-plan-'+plan.id" class="w-38 text-center"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-display">
            <div class="card gray-back my-4">
                <div class="card-body py-5">
                    <div class="col text-center">
                        <span class="d-flex flex-column align-items-center justify-content-center">
                            <article class="text-center w-100">
                                <img v-for="idio in membresia.idiomas" :key="'iidi-'+idio.id" class="mx-1 iz-15 mini-flag-img active" :src="idio.src"  alt="membresia idioma">
                            </article>
                            <h1 class="my-3">{{membresia.nombre}}</h1>
                        </span>
                        <h4 class="fw-500 px-3">Selecciona tu membresía y comienza aprender.</h4>
                    </div>
                    <div class="col mt-5 d-flex flex-column align-items-center justify-content-end text-center">
                        <span class="fw-500 d-block mb-2 w-75 span-payment-methods">
                            Aceptamos múltiples metodos de pago.
                        </span>
                        <article class="mt-2 w-100">
                            <img class="mx-2 iz-25" src="/images/stripe-logo.svg"  alt="membresia idioma">
                            <img class="mx-2 iz-25" src="/images/paypal-logo.svg"  alt="membresia idioma">
                        </article>
                    </div>
                </div>
            </div>
            <nav>
              <div class="nav nav-tabs d-flex text-center" id="nav-tab" role="tablist">
                <a v-for="(plan, key) in membresia.planes" :class="[ 'nav-link flex-fill', key === 0 ? 'active' : null ]" :id="`nav-${plan.id}-tab`" data-toggle="tab" :href="`#nav-${plan.id}`" role="tab" :aria-controls="`#nav-${plan.id}`" :aria-selected="key === 0 ? true : false">{{ plan.nombre }}</a>
              </div>
            </nav>
            <div class="tab-content bg-white" id="nav-tabContent">
                <div v-for="(plan, key) in membresia.planes" :class="[ 'tab-pane fade', key === 0 ? 'show active' : null ]" :id="`nav-${plan.id}`" role="tabpanel" :aria-labelledby="`nav-${plan.id}-tab`">
                    <div class="card-membership-mobile text-center py-5">
                        <div class="d-flex flex-column">
                            <h3 class="fw-600">
                                {{ membresia.nombre }}
                            </h3>
                            <span class="my-2 color-plomo">Pago {{ plan.tipo }}</span>
                            <span class="price-mobile">
                                {{ plan.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                            </span>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="color-plomo fw-500" style="font-size: 1rem;">
                                    Tendrás acceso a:
                                </span>                                      
                                <ul class="list-group mx-auto mt-2 color-plomo">
                                    <li class="li-benefits">Dashboard de seguimiento</li>
                                    <li class="li-benefits">Clases offline</li>
                                </ul>
                            </div>
                        </div>
                        <a :href="`/comprar/plan/${plan.id}/${plan.nombreURL}`" class="btn my-2 px-4 py-2 btn-success mx-auto">
                            <span class="h5 mb-0">Comprar</span>
                        </a>
                    </div>
                    <ul class="membership-details mx-4">
                        <li class="d-flex align-items-center py-2">
                            <div class="w-75"><h3 class="mb-0">Estudiantes con acceso a la plataforma</h3></div>
                            <div class="w-25 text-center p-4"><span class="h4 bold">1</span></div>
                        </li>
                        <li class="d-flex align-items-center py-2">
                            <div class="w-75"><h3 class="mb-0">Panel de monitoreo para padres</h3></div>
                            <div class="w-25 text-center"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center py-2">
                            <div class="w-75"><h3 class="mb-0">Clases nuevas semanales</h3></div>
                            <div class="w-25 text-center p-4"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center py-2">
                            <div class="w-75"><h3 class="mb-0">Juegos educativos</h3></div>
                            <div class="w-25 text-center p-4"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center py-2">
                            <div class="w-75"><h3 class="mb-0">Certificado de finalización</h3></div>
                            <div class="w-25 text-center p-4"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center py-2">
                            <div class="w-75"><h3 class="mb-0">Clases en full HD</h3></div>
                            <div class="w-25 text-center p-4"><img class="mx-1" src="/images/check.svg"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"menbresua-sow",
        props:['membresia'],
        data() {
            return {
                keysArray : Object.keys(this.membresia.planes),
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

    .mobile-display .card.gray-back {
        border-radius: 8px;
    }

    .li-benefits {
        list-style: none;
        line-height : 40px;
    }

    .span-payment-methods{
        font-size : 0.95rem;
    }

    .select-subtitle {
        font-size: 0.8rem;
        font-weight: 500;
        line-height: 20px;
    }

    .card-membership-web {
        background: #FFFFFF;
        box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    .card-membership-web:hover .badge-pill {
        background-color: #FAB500;
    }

    .price-web {
        font-style: normal;
        font-weight: 600;
        font-size: 2.5rem;
        line-height: 48px;
        margin-bottom: 0;
    }

    .price-mobile {
        font-style: normal;
        font-weight: 600;
        font-size: 2.5rem;
        line-height: 48px;
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
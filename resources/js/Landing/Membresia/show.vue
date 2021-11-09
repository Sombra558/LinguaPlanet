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
                        <div class="card-body py-3 d-flex flex-column">
                            <div class="col px-0">
                                <span class="d-flex mb-2 align-items-center justify-content-center">
                                    <img v-for="idioma in membresia.idiomas" class="mx-1 iz-10 mini-flag-img active" :src="`${idioma.src}`"  alt="membresia idioma">
                                    <h3 class="bold mb-0 ml-2">{{membresia.nombre}}</h3>
                                </span>
                                <h4 class="px-3 select-subtitle">Selecciona tu membresía y comienza aprender.</h4>
                            </div>
                            <div class="col px-0">
                                <span class="d-flex mb-2 span-payment-methods">
                                    Aceptamos múltiples metodos de pago.
                                </span>
                                <img class="mx-1" src="/images/stripe-logo.svg"  alt="membresia idioma">
                                <img class="mx-1" src="/images/paypal-logo.svg"  alt="membresia idioma">
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
                                    <div v-for="(plan) in offsetCarousel(key)" class="card card-membership-web mx-3" style="width : 15rem;">
                                        <div class="card-header border-0 text-center py-3">{{ plan.nombre }}</div>
                                        <div class="card-body px-1 d-flex flex-column text-center">
                                            <span class="price-web">
                                                {{ plan.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                                            </span>
                                            <span class="h4">Pago {{ plan.tipo }}</span>
                                            <ul class="text-left w-80 mx-auto mt-4">
                                                <li class="li-benefits text-secondary"><span class="text-primary bold">{{plan.stock}} perfil</span> de estudiante en la plataforma.</li>
                                                <li class="li-benefits text-secondary">Certificado de finalización.</li>
                                                <li class="li-benefits text-secondary">Clases nuevas semanales.</li>
                                            </ul>
                                            <a :href="`/comprar/plan/${plan.nombreURL}`" class="btn w-50 py-2 btn-primary-red mx-auto">
                                            <span class="h5 bold mb-0">Comprar</span></a>
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
            <div class="card gray-back">
                <div class="card-body">
                    <div class="col">
                        <span class="d-flex align-items-center justify-content-center">
                            <img v-for="idio in membresia.idiomas" :key="'iidi-'+idio.id" class="mx-1 mini-flag-img active" :src="`/storage/images/${idio.diminutivo}.svg`"  alt="membresia idioma">
                            <h1 class="mb-0 ml-3">{{membresia.nombre}}</h1>
                        </span>
                        <h3 class="text-center">Selecciona tu membresía y comienza aprender.</h3>
                    </div>  
                </div>
                <nav>
                  <div class="nav nav-tabs d-flex text-center" id="nav-tab" role="tablist">
                    <a v-for="(plan, key) in membresia.planes" :class="[ 'nav-link flex-fill', key === 0 ? 'active' : null ]" :id="`nav-${plan.id}-tab`" data-toggle="tab" :href="`#nav-${plan.id}`" role="tab" :aria-controls="`#nav-${plan.id}`" :aria-selected="key === 0 ? true : false">{{ plan.nombre }}</a>
                  </div>
                </nav>
                <div class="tab-content bg-white" id="nav-tabContent">
                    <div v-for="(plan, key) in membresia.planes" :class="[ 'tab-pane fade', key === 0 ? 'show active' : null ]" :id="`nav-${plan.id}`" role="tabpanel" :aria-labelledby="`nav-${plan.id}-tab`">
                        <div class="card-membership-mobile text-center">
                            <div class="d-flex flex-column">
                                <span class="price-mobile">
                                    {{ plan.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                                </span>
                                <span class="h4">Pago {{ plan.tipo }}</span>
                                <ul class="text-left w-80 mx-auto">
                                    <li><span class="text-primary bold">1 perfil</span> de estudiante en la plataforma.</li>
                                    <li>Certificado de finalización.</li>
                                    <li>Clases nuevas semanales.</li>
                                </ul>
                            </div>
                            <a class="btn btn-primary-red px-5 mt-3 mb-2" href="">Comprar</a>
                        </div>
                        <ul class="membership-details mx-4">
                            <li class="d-flex align-items-center py-2">
                                <div class="w-75"><h3 class="mb-0">Estudiantes con acceso a la plataforma</h3></div>
                                <div class="w-25 text-center p-4"><span class="h4 bold">1</span></div>
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <div class="w-75"><h3 class="mb-0">Panel de monitoreo para padres</h3></div>
                                <div class="w-25 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <div class="w-75"><h3 class="mb-0">Clases nuevas semanales</h3></div>
                                <div class="w-25 text-center p-4"><img class="mx-1" src="/storage/images/check.svg"></div>
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <div class="w-75"><h3 class="mb-0">Juegos educativos</h3></div>
                                <div class="w-25 text-center p-4"><img class="mx-1" src="/storage/images/check.svg"></div>
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <div class="w-75"><h3 class="mb-0">Certificado de finalización</h3></div>
                                <div class="w-25 text-center p-4"><img class="mx-1" src="/storage/images/check.svg"></div>
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <div class="w-75"><h3 class="mb-0">Clases en full HD</h3></div>
                                <div class="w-25 text-center p-4"><img class="mx-1" src="/storage/images/check.svg"></div>
                            </li>
                        </ul>
                    </div>
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
    .li-benefits {
        text-indent : -4px;
        margin-left : -2em;
        font-size : 0.8rem;
        line-height : 40px;
    }

    .span-payment-methods{
        font-size : 0.85rem;
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

    .card-membership-web:hover .card-header {
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
        font-weight: 700;
        font-size: 32px;
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
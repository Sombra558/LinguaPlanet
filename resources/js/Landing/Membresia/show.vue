<template>
    <div class="col">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h2 class="text-center"><span class="membership-span">Enseñamos idiomas</span> a través del juego ¿Qué esperas para que tus hijos inicien?</h2>
            </div>
        </div>
        <div class="web-display">
            <div class="row mt-4">
                <div class="col-3">
                    <div class="card h-100 gray-back">
                        <div class="card-body py-3 d-flex flex-column">
                            <div class="col px-0">
                                <span class="d-flex mb-2 align-items-center justify-content-center">
                                    <img class="mx-1 iz-10 mini-flag-img active" :src="`/storage/images/${membresia.idioma.diminutivo}.svg`"  alt="membresia idioma">
                                    <h3 class="bold mb-0 ml-2">{{membresia.nombre}}</h3>
                                </span>
                                <h4 class="px-3 select-subtitle">Selecciona tu membresía y comienza aprender.</h4>
                            </div>
                            <div class="col px-0">
                                <span class="d-flex mb-2 span-payment-methods">
                                    Aceptamos múltiples metodos de pago.
                                </span>
                                <img class="mx-1" src="/storage/images/stripe-logo.svg"  alt="membresia idioma">
                                <img class="mx-1" src="/storage/images/paypal-logo.svg"  alt="membresia idioma">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-deck">
                        <div v-for="(plan, key) in membresia.planes" class="card card-membership-web mx-3">
                            <div class="card-header bg-primary text-white border-0 text-center py-3">{{ plan.nombre }}</div>
                            <div class="card-body px-1 d-flex flex-column text-center">
                                <span class="price-web">
                                    {{ plan.precio.toLocaleString('de-DE', { style: 'currency', currency: 'USD' }) }}
                                </span>
                                <span class="h4">Pago {{ plan.tipo }}</span>
                                <ul class="text-left w-80 mx-auto mt-4">
                                    <li class="li-benefits text-secondary"><span class="text-primary bold">1 perfil</span> de estudiante en la plataforma.</li>
                                    <li class="li-benefits text-secondary">Certificado de finalización.</li>
                                    <li class="li-benefits text-secondary">Clases nuevas semanales.</li>
                                </ul>
                                <a :href="`/comprar/plan/${plan.nombreURL}`" class="btn w-50 btn-primary-red mx-auto"><h3 class="mb-0">Comprar</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="membership-details text-left mx-auto mt-4">
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Estudiantes con acceso a la plataforma</h4></div>
                            <div class="w-38 text-center p-3"><span class="h4 bold">1</span></div>
                            <div class="w-38 text-center p-3"><span class="h4 bold">1</span></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Panel de monitoreo para padres</h4></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Clases nuevas semanales</h4></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Juegos educativos</h4></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Certificado de finalización</h4></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <div class="w-24"><h4 class="mb-0">Clases en full HD</h4></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
                            <div class="w-38 text-center"><img class="mx-1" src="/storage/images/check.svg"></div>
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
                            <img class="mx-1 mini-flag-img active" :src="`/storage/images/${membresia.idioma.diminutivo}.svg`"  alt="membresia idioma">
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
        props:['idiomas','membresia']
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
        border-radius: 12px 12px 0 0;
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
</style>
<template>
    <div class="container mt-5 pt-2">
        <div class="row py-4 justify-content-center">
            <div class="col-12">
                <a href="/home/detalles-avances/cursos">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27 16H5" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 7L5 16L14 25" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <span class="h4 bold ml-4">Pagos</span>
            </div>
            <div class="col-12 col-md-10 col-lg-11 my-3">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li @click.prevent=" selectedTab = 'M' " class="mx-md-3 nav-item text-center" role="presentation">
                        <a class="nav-link px-1 py-3 active" id="pills-general-info-tab" data-toggle="pill" href="#pills-general-info" role="tab" aria-controls="pills-general-info" aria-selected="true">
                            Membresias activas
                        </a>
                    </li>
                    <li @click.prevent=" selectedTab = 'P' " class="mx-md-3 nav-item text-center" role="presentation">
                        <a class="nav-link px-1 py-3" id="pills-security-tab" data-toggle="pill" href="#pills-security" role="tab" aria-controls="pills-general-info" aria-selected="false">
                            Historial de pagos
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-10 col-lg-11">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-general-info" role="tabpanel" aria-labelledby="pills-general-info-tab">
                        <div class="row">
                            <Membresias :perfiles="user.perfiles" :membresias="user.planes"/> 
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab">
                        <div class="row">
                            <Pagos :pagos="user.planes"/>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</template>

<script>
import Membresias from './Activas/activas';
import Pagos from './Pagos/pagos';
    export default {
        name:"pagos-component",
        props:['user'],
        components: {
            Membresias,Pagos,
        },
        data() {
            return {
                selectedTab : 'M'
            }
        }
    }
</script>

<style lang="scss" scoped>
    .nav-item {
        position : relative;
        font-size: 1.2rem;
    }
    .nav-link {
        color : #606060;
    }
    .nav-link.active {
        background : #FFF;
        color : #31348B;
    }
    .nav-link.active::after {
        content: "";
        background: #31348B;
        position: absolute;
        bottom: 0;
        left: 0;
        height: 2px;
        width: 100%;
    }
    .globe-profile {
        display : flex;
        justify-content: center;
        align-items: center;
        width: 55px;
        height: 55px;
        border-radius: 50px;
        background-color: #31348B;
        color : white;
        font-size : 33px;
    }
    .profile-title{
        color:#5F01F5;
        font-size: 20px;
        font-family: 'Rubik';
        font-weight: bold;
    }
    .fonto-seccion{
        flex-direction: column;
        width: 100%;
        display: flex;
        justify-content: between;
        border-radius: 12px;
    }
</style>
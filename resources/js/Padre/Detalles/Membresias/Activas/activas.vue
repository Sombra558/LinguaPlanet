<template>
    <div class="col-12">
        <div class="card mx-3">
            <div class="card-body">
                <ul class="list-group">
                    <li class="d-none d-md-flex flex-fill py-3">
                        <div clasS="col-3 p-0">
                            <span class="h5 text-dark flex-fill">
                                Idiomas
                            </span>    
                        </div>
                        <div class="col-9 p-0">
                            <span class="h5 text-dark flex-fill">
                                Membresías    
                            </span>    
                        </div>            
                    </li>
                    <li class="list-group-item py-3" v-for="plan in membresias" :key="plan.id">
                        <div class="row">
                            <div class="text-center idioma-title text-md-left col-12 col-md-3 col-lg-3">
                                {{plan.membresia.idioma.idioma}}
                            </div>
                            <div clasS="col-12 col-md-9 col-lg-9 p-0">
                                <PlanCard :plan="plan"/>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import PlanCard from './planCard';
    export default {
        name:"activas-component",
        props:["membresias"],
        components: {
            PlanCard,
        },
    }
</script>

<style lang="scss" scoped>
    .list-group-item {
        border : none;
    }
    .idioma-title {
        color : #606060;
        font-size : 1.2rem;
        font-weight : 500;
    }
    @media (min-width : 768px) {
        .idioma-title {
            color : #31348B;
            font-size : 1rem;
            font-weight : 400;
        }
        
        .list-group-item {
            padding : 0;
            border : none;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }    
    }    
</style>
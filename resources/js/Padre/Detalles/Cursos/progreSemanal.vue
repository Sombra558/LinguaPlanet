<template>
     <span class="col-3 col-md-2 h4 color-plomo d-flex justify-content-center align-items-center">{{progreso.toFixed(2)}}%</span>
</template>

<script>
    export default {
        name:"progresoSemanal",
        props:['clase','actividades'],
        computed: {
            progreso() {
                var pro=0;
                this.actividades.forEach(act => {
                    if (act.clase_id === this.clase.id) {
                        pro=pro+1;
                    }
                });
                if (pro>0) {
                    return pro/7*100;
                }else{
                    return pro;
                }
                
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
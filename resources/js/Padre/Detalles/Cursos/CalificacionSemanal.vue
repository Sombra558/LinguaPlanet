<template>
      <span class="col-3 col-md-2 h4 color-plomo d-flex justify-content-center align-items-center">{{calificacion}}</span>
</template>

<script>
    export default {
        name:"progresoSemanal",
        props:['clase','actividades'],
        computed: {
            calificacion() {
                var pro=0;
                var acumulador=0;
                this.actividades.forEach(act => {
                    if (act.clase_id === this.clase.id && act.pivot.calificacion!=null) {
                        pro=pro+1;
                        acumulador=acumulador+act.pivot.calificacion;
                    }
                });
                if (pro>0) {
                    return acumulador/pro;
                }else{
                    return 0;
                }
                
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
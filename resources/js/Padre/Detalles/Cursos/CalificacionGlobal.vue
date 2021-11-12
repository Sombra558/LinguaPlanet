<template>
      <span class="h4">{{califiacionG.toFixed(2)}}</span>
</template>

<script>
    export default {
        name:"Calificacion-Global",
        props:['clase','actividades'],
        computed: {
            califiacionG() {
                var acumulador=0;
                var pro=0;
                this.actividades.forEach(act => {
                    if (act.tipo === 'Mochila' || act.tipo === 'Rompecabeza' || act.tipo === 'Silueta' || act.tipo === 'Simon Dice' || act.tipo==='Memorama') {
                        acumulador=acumulador+act.pivot.calificacion;
                        pro=pro+1;
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
<template>
      <span class="h4">{{repeticiones}}</span>
</template>

<script>
    export default {
        name:"repeticion",
        props:['clase','actividades'],
        computed: {
            repeticiones() {
        
                var acumulador=0;
                this.actividades.forEach(act => {
                    if (act.tipo === 'Mochila' || act.tipo === 'Rompecabeza' || act.tipo === 'Silueta' || act.tipo === 'Simon Dice' || act.tipo==='Memorama') {
                        acumulador=acumulador+act.pivot.repeticiones;
                    }
                });
              
                    return acumulador;
                
                
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
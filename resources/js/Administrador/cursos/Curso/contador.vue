<template>
    <span>
        {{actividades}}
    </span>
</template>

<script>
    export default {
        name:"contador-component",
        props:['modulo'],
        computed: {
            actividades() {
                var cont=0;
                if (this.modulo.clases.length>0) {
                    this.modulo.clases.forEach(clase => {
                        if (clase.actividades.length>0) {
                            clase.actividades.forEach(element => {
                                cont++;
                            });
                        }
                    });
                }
                return cont; 
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
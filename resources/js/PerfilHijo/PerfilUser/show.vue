<template>
    <div>
        <div v-for="idioma in idiomas" :key="idioma.id">
            <a :href="'/home/app/'+perfil.id+'/'+perfil.apodo+'/idiomas/'+idioma.nombreURL">{{idioma.idioma}}</a>
                
        </div>
        <a href="/home">Cambiar perfil</a>
    </div>
</template>

<script>
    export default {
        name:"perfiluser-show-component",
        props:['perfil'],
        data() {
            return {
                idiomas: [],
            }
        },
        mounted () {
            this.perfil.planes.forEach(plan => {
                if (this.idiomas.some(evt => evt.id===plan.plan.membresia.idioma.id)!=true) {
                    this.idiomas.push(plan.plan.membresia.idioma);
                }
               
            });
        },
    }
</script>

<style lang="scss" scoped>

</style>
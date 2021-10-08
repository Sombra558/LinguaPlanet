<template>
    <div>
       <form @submit.prevent="crearcurso()">
            <div class="form-group col-md-6 col-12">
                    <label for="titulo" >Titulo</label>
                    <input type="text" class="form-control"  name="titulo" v-model="newcurso.titulo" required>
            </div>
            <div class="form-group col-md-6 col-12">
                    <label for="titulo" >Descripcion</label>
                    <textarea name="descripcion" class="form-control"  v-model="newcurso.descripcion" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group col-md-6 col-12">
                    <label for="titulo" >Nombre URL</label>
                    <input type="text" v-model="nombreURL" name="nombreURL" class="form-control" required>
            </div>
            <div class="form-group col-md-4 row m-0 flex-column">
                    <label for="titulo" >Trailer</label>
                    <input type="text" v-model="newcurso.video" name="video" placeholder="Link" class="form-control">
            </div>
            <input type="submit" value="Guardar Borrador">
       </form>
    </div>
</template>

<script>
    export default {
        name:'create-curso',
        props:['membresias'],
        data() {
            return {
                newcurso: {
                    titulo:'',
                    descripcion:'',
                    video:'',
                  
                    nombreURL:'',

                }
            }
        },
        computed: {
             nombreURL() {
                var tituloorigi=this.newcurso.titulo;
                this.newcurso.nombreURL = tituloorigi.replace(/[ ?¿!¡/\\🔴]/g, "-")
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .toLowerCase();
                    return this.newcurso.nombreURL;
            },
        },
        methods: {
            crearcurso() {
                var url = '/admin/curso';
                axios.post(url,this.newcurso).then((result) => {
                    window.location='/admin/curso/'+result.data.id;
                }).catch((err) => {
                    console.log(err);
                });
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
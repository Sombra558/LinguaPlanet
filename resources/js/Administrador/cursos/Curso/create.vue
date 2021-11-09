<template>
    <div class="container">
        <h3 class="color-black">Nuevo curso</h3>
       <form @submit.prevent="crearcurso()">
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label for="titulo" >Titulo</label>
                    <input type="text" class="form-input input-gray"  name="titulo" v-model="newcurso.titulo" placeholder="Ingresa el titulo del curso" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="titulo" >Nombre URL</label>
                    <input type="text" v-model="nombreURL" name="nombreURL" class="form-input input-gray" placeholder="Ingresa el nombre que se vera en la URL" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label for="titulo" >Trailer</label>
                    <input type="text" v-model="newcurso.video" name="video" placeholder="Ingresa el link del trailer del curso" class="form-input input-gray">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label for="titulo" >Descripcion</label>
                    <textarea name="descripcion" class="form-input input-gray"  v-model="newcurso.descripcion" cols="30" rows="10" placeholder="Ingresa una descripción al curso" required></textarea>
                </div>
            </div>
                  <div class="row">
                                <div class="form-group form-group-admin col-6">
                                    <label for="tipo_cupon" >idioma</label>
                                    <select class="form-input form-input-admin input-primary" name="idiomas[]"  v-model="newcurso.idioma_id" required>
                                        <option :value="null">Seleccionar</option>
                                        <option v-for="idioma in idiomas" :key="idioma.id" :value="idioma.id">{{idioma.idioma}}</option>
                                    </select>
                                </div>
                            </div>
            <div class="row justify-content-end">
                <div class="form-group col-12 col-lg-3">
                    <input type="submit" class="btn btn-lg btn-secondary bg-plomo w-100" value="Guardar borrador">
                </div>
            </div>
       </form>
    </div>
</template>

<script>
    export default {
        name:'create-curso',
        props:['membresias','idiomas'],
        data() {
            return {
                newcurso: {
                    titulo:'',
                    descripcion:'',
                    video:'',
                    idioma_id:null,
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
    .btn {
        font-weight: 400;
        font-size: 0.9rem;
    }

    label {
        color : #606060;
        font-weight: 500;
    }
</style>
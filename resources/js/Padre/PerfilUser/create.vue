<template>
    <div class="container mb-4">
        <div class="row mb-5">
            <div clasS="col-sm-12 text-center">
                <h3 class="bold mt-4">Crear Nuevo Perfil</h3>
                <span v-if="tabnivel === 0">Que le gusta más a tu hijo</span>
                <span v-else-if="tabnivel === 1">Ingresa su fecha de nacimiento</span>
                <span v-else-if="tabnivel === 2">Seleccione un avatar y un apodo</span>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div :class="[ 'col-sm-12', tabnivel === 2 ? 'col-md-6 col-lg-9' : null ]">
                <form @submit.prevent="enviar" id="create-perfil">
                    <div class="tab-content" id="myTabContent">
                        <div v-if="tabnivel===0" class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-deck">
                                      <div class="card mb-2 mb-md-4">
                                          <button class="btn btn-outline-primary py-4 py-md-5" @click.prevent="seleccionarHobby('Dibujar y Colorear', $event)">Dibujar y Colorear</button>
                                      </div>
                                      <div class="card mb-2 mb-md-4">
                                          <button class="btn btn-outline-primary py-4 py-md-5" @click.prevent="seleccionarHobby('Jugar con Legos', $event)">Jugar con Legos</button>
                                      </div>
                                      <div class="card mb-2 mb-md-4">
                                          <button class="btn btn-outline-primary py-4 py-md-5" @click.prevent="seleccionarHobby('Deportes', $event)">Deportes</button>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-deck">
                                      <div class="card mb-2 mb-md-4">
                                          <button class="btn btn-outline-primary py-4 py-md-5" @click.prevent="seleccionarHobby('Bailar, Cantar y escuchar musica', $event)">Bailar, Cantar y escuchar musica</button>
                                      </div>
                                      <div class="card mb-2 mb-md-4">
                                          <button class="btn btn-outline-primary py-4 py-md-5" @click.prevent="seleccionarHobby('Correr', $event)">Correr</button>
                                      </div>
                                      <div class="card mb-2 mb-md-4">
                                          <button class="btn btn-outline-primary py-4 py-md-5" @click.prevent="seleccionarHobby('Dibujar', $event)">Dibujar</button>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="tabnivel===1" class="tab-pane fade d-flex justify-content-center" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="input-primary col-12 col-md-4">
                                <input
                                    type="date"
                                    class="form-input"
                                    name="f_nacimiento"
                                    v-model="perfil.f_nacimiento"
                                    placeholder="Selecciona una fecha"
                                    required
                                >
                            </div>                            
                        </div>
                        <div v-if="tabnivel===2" class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row justify-content-center mb-2">
                                <div class="col text-center" v-for="animal in animals" :key="animal.id">
                                    <div :class="['animal-container mb-2 d-flex', perfil.animal===animal.id ? 'selected' : null ]" @click.prevent="seleccionarAnimal(animal.id, $event)" :style="{ 'background-color' : perfil.animal===animal.id ? perfil.color : '' }">
                                        <img class="animal-icon mx-auto my-auto" :src="`${animal.cara}`">    
                                    </div>
                                    <span class="d-block">{{animal.animal}}</span>    
                                </div>
                            </div>
                            <div class="row justify-content-around my-4">
                                <div class="col-12 col-lg-8">
                                    <div class="row justify-content-between">
                                        <div class="col-2 text-center" v-for="col in colores" :key="col">
                                            <button class="btnColor" :style="`background-color:${col};border:none;width:30px;height:30px;border-radius:50px;`" @click.prevent="seleccionarColor(col, $event)">
                                                <svg :class="perfil.color===col ? 'selected' : ''" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.6666 5L7.49992 14.1667L3.33325 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <input type="text" class="form-input py-2 input-primary" placeholder="Apodo" name="apodo" required>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div :class="[ 'text-center', tabnivel === 0 ? 'col-12 col-lg-6' : tabnivel === 2 ? 'col-12 col-lg-6' : 'col-12 col-lg-4' ]">
                            <button v-if="tabnivel>=1" class="btn mx-2 col-5 col-md-5 bg-gray text-white" @click.prevent="regresar()"><span class="h6">Regresar</span></button> 
                            <button v-if="tabnivel!=2" class="btn mx-2 col-5 col-md-5 btn-primary-red px-4" @click.prevent="siguiente()">Siguiente</button>
                            <button v-else-if="tabnivel===2" class="btn mx-2 col-5 col-md-5 btn-primary-red px-4" type="submit" @click.prevent="enviar()">Siguiente</button>
                            <br/><button v-if="tabnivel===0" class="btn my-3 transparent-button color-plomo" @click.prevent="regresar()"><span class="h5">Omitir</span></button> 
                        </div>
                    </div>
                </form>
            </div>            
        </div>         
    </div>
</template>

<script>
    export default {
        name:"create-component",
        props:['animals'],
        data() {
            return {
                tabnivel:0,
                colores:['#E4032F','#FAB500','#00A53F','#31348B','#0092D2'],
                perfil:{
                    animal_id:null,
                    hobby:null,
                    f_nacimiento:null,
                    apodo:null,
                    color: '#E4032F',
                }
            }
        },
        methods:{
            siguiente(){
                    if (this.tabnivel<2) {
                        this.tabnivel++;
                    }
                    switch (this.tabnivel) {
                        case 0:
                           setTimeout(function(){
                                $("#home").tab("show");
                           
                            },200)
                             break;
                            
                        case 1:
                            setTimeout(function(){
                            $("#profile").tab("show");
                          
                              },200)
                                break;
                        case 2:
                             setTimeout(function(){
                            $("#contact").tab("show");
                        
                              },200)
                                break;
                        default:
                            break;
                    }
            },
            regresar(){
                if (this.tabnivel>0) {
                        this.tabnivel--;
                    }
                    switch (this.tabnivel) {
                        case 0:
                           setTimeout(function(){
                                $("#home").tab("show");
                           
                            },200)
                             break;
                            
                        case 1:
                            setTimeout(function(){
                            $("#profile").tab("show");
                          
                              },200)
                                break;
                        case 2:
                             setTimeout(function(){
                            $("#contact").tab("show");
                        
                              },200)
                                break;
                        default:
                            break;
                    }
            },
            seleccionarHobby(value, e){
                document.querySelector('.btn-outline-primary.active')?.classList.toggle('active');
                e.currentTarget.classList.toggle('active');
                this.perfil.hobby=value;
            },
            seleccionarAnimal(value, e){
                document.querySelector('.animal-container.selected')?.style.removeProperty('background-color');
                document.querySelector('.animal-container.selected')?.classList.toggle('selected');
                e.currentTarget.classList.toggle('selected');
                document.querySelector('.animal-container.selected').style.backgroundColor = this.perfil.color;
                this.perfil.animal=value;
            },
            seleccionarColor(value, e){
                document.querySelector('svg.selected')?.classList.toggle('selected');
                e.currentTarget.firstChild.classList.toggle('selected');
                document.querySelector('.animal-container.selected').style.backgroundColor = value;
                this.perfil.color=value;
            },
            async enviar() {
            let form = $("#create-perfil")[0];
            let formulario = new FormData(form);
            formulario.append("hobby", this.perfil.hobby);
            formulario.append("animal_id", this.perfil.animal);
            formulario.append("color", this.perfil.color);
            formulario.append("f_nacimiento", this.perfil.f_nacimiento);
                    try {
                    let res2 = await axios.post('/home/perfil-user', formulario)
                    //toastr.success('El post ha sido creado correctamente.')
                    setTimeout(() => {
                        window.location = "/home";
                    }, 2000) 
                    } catch(e) {
                    console.log(e)
                    //toastr.error("Ocurrio un error");
                    }
            
        },
            }
    }
</script>

<style lang="scss" scoped>
    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        left: 2%;
        top: 30%;
        width: 50px;
        height: 20px;
        margin: 0;
        padding: 0;
        color : red;
        z-index : 0;
        cursor: pointer;
    }

    .animal-container {
        width : 100px;
        height : 100px;
        border-radius : 50px;
    }

    img.animal-icon {
        width : 75%;
        height : 75%;
    }

    .btnColor svg {
        display : none;
    }

    .btnColor .selected {
        display : inherit !important;
    }
</style>
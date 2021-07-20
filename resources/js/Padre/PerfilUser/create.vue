<template>
    <div>
        <h2>Crear Nuevo perfil</h2>
         <form @submit.prevent="enviar" id="create-perfil">
            <div class="tab-content" id="myTabContent">
                <div v-if="tabnivel===0" class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                     <span>Que le gusta mas a tu hijo</span>
                            <button @click.prevent="seleccionarHobby('Dibujar y Colorear')">Dibujar y Colorear</button>
                            <button @click.prevent="seleccionarHobby('Jugar con Legos')">Jugar con Legos</button>
                            <button @click.prevent="seleccionarHobby('Deportes')">Deportes</button>
                            <button @click.prevent="seleccionarHobby('Bailar, Cantar y escuchar musica')">Bailar, Cantar y escuchar musica</button>
                            <button @click.prevent="seleccionarHobby('Correr')">Correr</button>
                            <button @click.prevent="seleccionarHobby('Dibujar')">Dibujar</button>          
                </div>
                <div  v-if="tabnivel===1" class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <span>Ingresa su fecha de nacimiento</span>
                    <input type="date" name="f_nacimiento" v-model="perfil.f_nacimiento" required>
                 
                </div>
                <div  v-if="tabnivel===2" class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                   <span>Seleccione Avatar y apodo</span>
                        <button v-for="animal in animals" :key="animal.id" @click.prevent="seleccionarAnimal(animal.id)">{{animal.animal}}</button>
                        <button :style="'background-color:'+col+'; width:50px:heigth:50px'" v-for="col in colores" :key="col" @click.prevent="seleccionarColor(col)"></button>
                        <input type="text" name="apodo" required>
                </div>
            </div>
            <button v-if="tabnivel!=0" @click.prevent="regresar()">Regresar</button>
    
            <button v-if="tabnivel!=2" @click.prevent="siguiente()">Siguiente</button>
            <button v-else-if="tabnivel===2" type="submit" @click.prevent="enviar()">Siguiente</button>
        </form>
             
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
                    color:null,
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
            seleccionarHobby(value){
                this.perfil.hobby=value;
            },
            seleccionarAnimal(value){
                this.perfil.animal=value;
            },
            seleccionarColor(value){
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

</style>
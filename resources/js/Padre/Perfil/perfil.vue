<template>
    <div class="container mt-5 pt-5">
        <div class="row py-4 justify-content-center">
            <div class="card col-11">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                          <li class="nav-item text-center" role="presentation">
                            <a class="nav-link py-3 active" id="pills-general-info-tab" data-toggle="pill" href="#pills-general-info" role="tab" aria-controls="pills-general-info" aria-selected="true">Datos Generales</a>
                          </li>
                          <li class="nav-item text-center" role="presentation">
                            <a class="nav-link py-3" id="pills-security-tab" data-toggle="pill" href="#pills-security" role="tab" aria-controls="pills-general-info" aria-selected="false">Seguridad</a>
                          </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <div class="tab-content my-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-general-info" role="tabpanel" aria-labelledby="pills-general-info-tab">
                                <div class="col-12 m-0">
                                    <div class="form-group row mb-4">
                                        <label class="d-flex align-items-center pl-0 col-12 col-md-12 col-lg-4 h6 text-dark">Imagen de perfil</label>
                                        <div class="col-sm-12 col-md-12 col-lg-8 d-flex flex-column flex-md-row align-items-center justify-content-between">
                                            <img v-if="user.img" class="img-profile mb-3" id="imgprev" :src="'/storage/'+user.img" alt="user-img">
                                            <div v-else class="globe-profile align-self-center my-3">
                                                {{ user.name[0]+user.lastname[0] }}
                                            </div>
                                            <div class="d-flex flex-fill">
                                                <div class="flex-fill text-center w-80">
                                                <label for="assetsFieldHandle" class="btn btn-sm btn-primary-red h6" v-if="this.filelist == null" style="border-radius : 50px;">
                                                    <span class="h6">Elegir una nueva imagen</span>
                                                </label>
                                                <span class="arrastre d-block text-center" style="font-family: 'TitilliumWeb-Regular'; ">
                                                    Arrastra aquí tu imagen de perfil
                                                </span>
                                                </div>
                                                <button class="btn btn-sm d-none d-sm-inline w-45">
                                                    <span class="h6 color-plomo" style="text-decoration : underline;">
                                                        Eliminar imagen
                                                    </span>
                                                </button>                                                                  
                                            </div>
                                        </div>
                                        <input type="file" style="opacity:0" name="img" id="assetsFieldHandle"
                                                class="overflow-hidden position-absolute inputFile"
                                                @change="onChange"
                                                ref="file"
                                                accept=".pdf,.jpg,.jpeg,.png"
                                        >                                    
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="email" class="d-flex align-items-center pl-0 col-sm-12 col-md-12 col-lg-3 h6 text-dark">
                                            Nombre del usuario
                                        </label>
                                        <div class="col-sm-12 col-md-12 col-lg-9 pl-0">
                                            <input id="name" type="text" class="form-control input-style-file" name="name" v-model="user.name" placeholder="Full name" required autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="email" class="d-flex align-items-center pl-0 col-sm-12 col-md-12 col-lg-3 h6 text-dark">
                                            Apellido del usuario
                                        </label>
                                        <div class="col-sm-12 col-md-12 col-lg-9 pl-0">
                                            <input id="lastname" type="text" class="form-control input-style-file" name="lastname" v-model="user.lastname" placeholder="Full name" required autocomplete="email">
                                        </div>
                                    </div>
                                     <div class="form-group row mb-4">
                                        <label for="email" class="d-flex align-items-center pl-0 col-sm-12 col-md-12 col-lg-3 h6 text-dark">
                                            Correo electrónico
                                        </label>
                                        <div class="col-sm-12 col-md-12 col-lg-9 pl-0">
                                            <input id="email" type="email" class="form-control input-style-file" name="email" v-model="user.email" placeholder="Email" required autocomplete="email" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab">
                                <div class="col-12 m-0">
                                    <div class="form-group row mb-4">
                                        <label for="password" class="d-flex align-items-center pl-0 col-sm-12 col-md-12 col-lg-3 h6 text-dark">Contraseña</label>
                                        <div class="col-sm-12 col-md-12 col-lg-9 pl-0">
                                            <input 
                                                v-model="newcont.password" 
                                                type="password"
                                                name="password"
                                                id="password"
                                                class="form-control input-style-file" 
                                                placeholder="Password" 
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="newPassword" class="d-flex align-items-center pl-0 col-sm-12 col-md-12 col-lg-3 h6 text-dark">Nueva contraseña</label>
                                        <div class="col-sm-12 col-md-12 col-lg-9 pl-0">
                                            <input 
                                                id="newPassword" 
                                                type="password"
                                                v-model="newcont.newPassword" 
                                                class="form-control input-style-file" 
                                                placeholder="New Password"
                                                name="password"
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="passwordConfirm" class="d-flex align-items-center pl-0 col-sm-12 col-md-12 col-lg-3 h6 text-dark">Confirmar nueva contraseña</label>
                                        <div class="col-sm-12 col-md-12 col-lg-9 pl-0">
                                            <input  
                                                id="passwordConfirm" 
                                                class="form-control input-style-file"
                                                type="password"
                                                placeholder="Confirm your password"
                                                name="password" 
                                                v-model="newcont.confirmPassword"   
                                                autofocus
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <input type="submit" class="btn btn-primary" value="Guardar cambios">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name:"perfil-component",
        props:['user'],
        data() {
            return {
                lastFile: null,
                filelist: null,
                tabselected:"data",
                newcont:{
                    password:"",
                    newPassword:"",
                    confirmPassword:""
                }
            }
        },
        computed: {
            readURL() {
            var imgprev = document.getElementById('imgprev')
            var input = document.getElementById('assetsFieldHandle')
            var src= "user";
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                imgprev.src=e.target.result;
                
              
                }
                reader.readAsDataURL(input.files[0]);
               
            
             }
               
             return src;
            },
           
        },
        methods: {
            seleccionar(tab){
                this.tabselected=tab;
            },
            onChange() {
            this.filelist = [...this.$refs.file.files];
            this.readURL();
            console.log(this.filelist)
            },
            remove(i) {
            this.filelist.splice(i, 1);
            },
            dragover(event) {
            event.preventDefault();
            // Add some visual fluff to show the user can drop its files
            if (!event.currentTarget.classList.contains('bg-green-300')) {
                event.currentTarget.classList.remove('bg-gray-100');
                event.currentTarget.classList.add('bg-green-300');
            }
            },
            dragleave(event) {
            // Clean up
            event.currentTarget.classList.add('bg-gray-100');
            event.currentTarget.classList.remove('bg-green-300');
            },
            drop(event) {
            event.preventDefault();
            this.$refs.file.files = event.dataTransfer.files;
            this.onChange(); // Trigger the onChange event manually
            // Clean up
            event.currentTarget.classList.add('bg-gray-100');
            event.currentTarget.classList.remove('bg-green-300');
            },
            actualziardatos(){
                    var url = `/home/actualizar-perfil/${this.user.id}`;
                    let formData = new FormData(
                        document.getElementById("perfil-form")
                    );
                    if (this.filelist!=null) {
                        formData.append("img", this.filelist[0]);
                    }
                    formData.append("name", this.user.name);
                    formData.append("email", this.user.email);
                    axios.post(url,formData).then((result) => {
                        
                        window.location.reload();
                    }).catch((err) => {
                        
                    });
            },
             guardarpassword() {
            if (
                this.newcont.password == ""
              ) {
                  toastr.error('El campo "Contraseña" no puede estar vacío');
              
              } else if (
                this.newcont.newPassword !=
                this.newcont.confirmPassword &&
                this.newcont.newPassword != ""
              ) {
                  toastr.error('La confirmación de contraseña no es igual a la contraseña indicada');
              } else {
                let urlprueba = "/home/actualizar-password";
                axios
                  .post(urlprueba, this.newcont)
                  .then((res) => {
                    if (res.status == 200) {
                      if (res.data == "incorrecto") {
                           toastr.error('La contraseña indicada es incorrecta');
                      
                      } else {
                        window.location.reload();
                      }
                    }
                  })
                  .catch((e) => {
                    console.log(e);
                  });
              }
                },
        },
    }
</script>

<style lang="scss" scoped>
    .nav-item {
        position : relative;
        font-size: 1.2rem;
    }
    .nav-link {
        font-size: 1rem;
        color : #606060;
    }
    .nav-link.active {
        background : #FFF;
        color : #31348B;
    }
    .nav-link.active::after {
        content: "";
        background: #31348B;
        position: absolute;
        bottom: 0;
        left: 0;
        height: 2px;
        width: 100%;
    }
    .globe-profile {
        display : flex;
        justify-content: center;
        align-items: center;
        width: 55px;
        height: 55px;
        border-radius: 50px;
        background-color: #31348B;
        color : white;
        font-size : 33px;
    }
    .profile-title{
        color:#5F01F5;
        font-size: 20px;
        font-family: 'Rubik';
        font-weight: bold;
    }
    .fonto-seccion{
        flex-direction: column;
        width: 100%;
        display: flex;
        justify-content: between;
        border-radius: 12px;
    }
    .img-profile{
        height: 140px;
        width: 140px;
        border-radius: 50%;
    }
    .text-data{
        font-size: 20px;
        font-family: 'Valera';
    }
    .borderdiv{
        width: 100%;
        height: 1px;
        background-color: #76807988;
    }
    .text-inbup{
        color: #282e2a83;
    }
    .text-data{
        margin-top: 10px;
    }
    .input-style-file{
        height: 42px;
        border-radius: 8px;
    }
    .btn-change{
        background-color: #30019B;
        border-radius: 10px;
        width: 181px;
        color: #ffffff;
        height: 41px;
        border: none;
    }
    #inputFile {
    /*   display: none; */
      margin-bottom: 25px;
    }

    #image-holder {
      width: 200px;
      min-width: 200px;
      border: 2px dashed rgba(0,0,0,0.3);
      color: rgba(0,0,0,0.8);
      padding: 10px;
      text-align: center;
    }

    #image-holder:hover {
      cursor: pointer;
    }

    #image-holder img {
      width: 200px;
      height: auto;
    }
    .arrastre{
        font-family: 'Valera';
        color:grey;
        font-size: 16px;
        line-height: 24,34px;
    }
    .arrastre strong{
         font-family: 'Valera';
         color:#5F01F5;
         font-size: 16px;
         line-height: 24,34px;
    }
    @media only screen and (max-width: 768px){
         .contenedor-nav-ocho{
            max-width:100%;
            margin-right:auto;
            margin-left: auto;
            width: 100%;
            height: 100vh;
        }
    }
</style>
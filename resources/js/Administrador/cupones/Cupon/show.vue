<template>
    <div class="container">
        <div class="row mb-3">
            <a class="color-plomo" href="/admin/cupones">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Volver
            </a>            
        </div>
        <div class="row gray-back py-3 mb-3">
            <div class="col">
                <h2>{{cupon.nombre}}</h2>
                <span class="color-plomo" style="font-size: 1rem;">Nombre del cupón</span>                
            </div>
        </div>        
        <div class="row mb-4 d-flex flex-column align-content-center text-center">
            <h3 class="fw-500">Código de descuento</h3>
            <div class="col-6 color-plomo gray-back p-3">
                <span class="h3 fw-500">{{cupon.codigo}}</span>
            </div>
            <div class="col-6 mt-3">
                <button id="codigo_cupon" class="btn btn-rounded mx-1 btn-primary" v-bind:data-clipboard-text="cupon.codigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 9H11C9.89543 9 9 9.89543 9 11V20C9 21.1046 9.89543 22 11 22H20C21.1046 22 22 21.1046 22 20V11C22 9.89543 21.1046 9 20 9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5 15H4C3.46957 15 2.96086 14.7893 2.58579 14.4142C2.21071 14.0391 2 13.5304 2 13V4C2 3.46957 2.21071 2.96086 2.58579 2.58579C2.96086 2.21071 3.46957 2 4 2H13C13.5304 2 14.0391 2.21071 14.4142 2.58579C14.7893 2.96086 15 3.46957 15 4V5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="btn btn-rounded mx-1 btn-primary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8C19.6569 8 21 6.65685 21 5C21 3.34315 19.6569 2 18 2C16.3431 2 15 3.34315 15 5C15 6.65685 16.3431 8 18 8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 15C7.65685 15 9 13.6569 9 12C9 10.3431 7.65685 9 6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18 22C19.6569 22 21 20.6569 21 19C21 17.3431 19.6569 16 18 16C16.3431 16 15 17.3431 15 19C15 20.6569 16.3431 22 18 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.59003 13.5098L15.42 17.4898" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.41 6.50977L8.59003 10.4898" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="row color-black mb-4">
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <span class="h6 d-block">Creado</span>
                <span>{{cupon.created_at}}</span>
            </div>
            <div class="col-12 col-lg-6">
                <span class="h6 d-block">Vencimiento</span>
                <span>{{cupon.vence}}</span>
            </div>
        </div>
        <div class="row color-black">
            <div class="col-12 col-lg-6">
                <span class="h6 d-block">Condición de descuento</span>
                <span>{{cupon.valor}}  {{cupon.tipo_descuento === 'Porcentual' ? '%' : 'USD'}}</span>
            </div>
        </div>
        <nav class="mt-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-historial-tab" data-toggle="tab" href="#nav-historial" role="tab" aria-controls="nav-historial" aria-selected="true">Historial de Cupones Canjeados</a>
                <a v-if="cupon.tipo_cupon==='Plan'" class="nav-link" id="nav-membresias-tab" data-toggle="tab" href="#nav-membresias" role="tab" aria-controls="nav-membresias" aria-selected="false">Membresias</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active pt-3" id="nav-historial" role="tabpanel" aria-labelledby="nav-historial-tab">
                <div class="row justify-content-between align-items-center flex-lg-row-reverse">
                    <div class="col-12 mb-3 mb-lg-0 col-lg-3 d-flex justify-content-between align-items-center">
                        <a class="btn btn-block btn-outline-primary px-4 fw-500" href="#">Exportar CSV</a>
                    </div>
                    <div class="col-12 col-lg-9 d-flex justify-content-between align-items-center">
                        <span class="h5 color-black m-0">Cupones canjeados</span>
                    </div>
                </div>   
            </div>
            <div class="tab-pane fade pt-3" id="nav-membresias" role="tabpanel" aria-labelledby="nav-membresias-tab">
                <div class="row justify-content-between flex-lg-row-reverse">
                    <div class="col-12 mb-3 mb-lg-0 col-lg-3 d-flex justify-content-between align-items-center">
                        <button class="btn btn-block btn-outline-primary px-4 fw-500" @click.prevent="relacionModal()">Relacionar Nueva Membresia</button>                
                    </div>
                    <div class="col-12 col-lg-9 d-flex justify-content-between align-items-center">
                        <span class="h5 color-black m-0">Membresias relacionadas</span>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col px-1">
                        <table class="table mt-2 table-borderless table-striped table-com">
                            <thead>
                                <tr class="color-black">
                                    <th>Nombre</th>
                                    <th>Idioma</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="color-black" v-for="(membresia,index) in cupon.membresias" :key="'indice-'+index">
                                    <td>{{membresia.nombre}}</td>
                                    <td>{{membresia.idioma.idioma}}</td>                   
                                    <td>
                                        <button @click.prevent="eliminarRelacion(membresia)" class="transparent-button p-0 color-plomo">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 6H5H21" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10 11V17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14 11V17" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="ml-1">
                                                Eliminar
                                            </span>
                                        </button>
                                    </td>                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
         <!--modal crear relacion cupon membresia-->
         <div class="modal fade" id="crearRelacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5 7.5L7.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 7.5L22.5 22.5" stroke="#010112" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <form id="relacion-member" @submit.prevent="RelacionCreate()" >
                        <div class="modal-body pt-0 px-5">                            
                            <div class="row">
                                <div class="col">
                                    <h4 class="fw-500 color-black mb-4" id="exampleModalLabel">Asignar membresia</h4>
                                </div>
                            </div>
                            <input type="hidden" :value="cupon.id" name="cupon_id">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="membresia_id" >Seleccione Membresia</label>
                                    <select class="form-input input-primary" name="membresia_id" v-model="newrelacion.membresia_id" >
                                        <option :value="null">Seleccione</option>
                                        <option :value="membresia.id" v-for="membresia in membresias" :key="'member'+membresia.id">{{membresia.nombre}}</option>
                                    </select>                                   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-lg btn-primary">Asignar</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
</template>

<script>
    import clipboardJs from '../../../clipboard.min';
    export default {
        name:"cupon-show",
        props:['cupon','membresias'],
        data() {
            return {
                proceso:false,
               tab: 'canjeos',
               membresiaSelected:null,
               newrelacion:{
                   cupon_id:this.cupon.id,
                   membresia_id:null,
               },
            }
        },
        mounted() {

            var clipboard = new clipboardJs('#codigo_cupon');

            // const Toast = Swal.mixin({
            //     toast: true,
            //     position: 'top',
            //     showConfirmButton: false,
            //     timer: 2000,
            //     timerProgressBar: true,
            //     onOpen: (toast) => {
            //       toast.addEventListener('mouseenter', Swal.stopTimer)
            //       toast.addEventListener('mouseleave', Swal.resumeTimer)
            //     }
            // })

            clipboard.on('success', function(e) {
                alert('exito');
                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                alert('fallo');
            });
        },
        methods: {
            seleccionartab(value) {
                this.tab=value;
            },
            relacionModal(){
                 $("#crearRelacion").modal("show");
            },
            RelacionCreate(){
                var url = '/admin/cupon-membresia';
                axios.post(url,this.newrelacion).then((result) => {
                    window.location.reload();
                }).catch((err) => {
                    console.log(err);
                });
            },
             eliminarRelacion(relacion){
                      this.proceso=true;
                      var url = '/admin/eliminar-relacion-cupon/'+relacion.pivot.id;
                      axios.delete(url).then((result) => {
                        window.location.reload();
                      }).catch((err) => {
                        console.log(err);
                        this.proceso=false;
                      });
                }
        },
    }
</script>

<style lang="scss" scoped>
    table thead th {        
        font-weight: 500;
        font-size: 1rem;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-footer {
        border-top-color: #B5B5BB;
        background-color: #F8F8F8;
    }

    .btn-rounded {
        border-radius: 50px;
        padding: 0.4rem;
    }

    @media(max-width: 768px) {
        .btn.btn-lg:not(.btn-nuevo-modulo) {
            display: block;
            width: 100%;
        }
    }
</style>
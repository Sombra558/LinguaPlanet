<template>
     <div>
            <h1>Cupones</h1>
            <Searh />
            <a @click.prevent="cuponmodal(null,'crear')">Crear Nuevo Cupón</a>
              <table style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Tipo de Cupon</th>
                        <th>Tipo de Descuento</th>
                        <th>Valor</th>
                        <th>Cantidad</th>
                        <th>Usados</th>
                        <th>Vencimiento</th>
                        <th>Accion</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(cupon,index) in filteredCupones" :key="index">
                    <td>{{cupon.nombre}}</td>
                    <td>{{cupon.codigo}}</td>
                    <td>{{cupon.tipo_cupon}}</td>
                    <th>{{cupon.tipo_descuento}}</th>
                    <td>{{cupon.valor}} {{cupon.tipo_descuento==='Porcentual' ? '%' : 'USD'}}</td>
                    <td>{{cupon.cantidad}}</td>
                    <td>--</td>
                    <td>{{cupon.vence}}</td>
                    <td>
                        <a :href="`/admin/cupon/${cupon.id}`">Ver detalle</a>
                        <a @click.prevent="cuponmodal(cupon,'editar')">Editar</a>
                        <button @click.prevent="eliminarCupon(cupon)">Eliminar</button>
                    </td>
                   
                </tr>
                </tbody>
            </table>
            <!--modal crear-->
             <div class="modal fade" id="crearCupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Cupón</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="crear-cupon" @submit.prevent="crearCupon()" ref="form">
                          <div class="form-group col-md-6 col-12">
                                <label for="codigo" >Código</label>
                                <input type="text" v-model="newcupon.codigo" maxlength="20" required>
                                <button type="button"  @click.prevent="generar('crear')">Generar Código</button>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre</label>
                                <input type="text" v-model="newcupon.nombre" maxlength="200" required>
                              
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >Tito de Cupón</label>
                                 <select name="tipo_cupon"  v-model="newcupon.tipo_cupon" required>
                                    <option :value="null">Seleccione</option>
                                    <option value="Global">Global</option>
                                    <option value="Plan">Plan</option>
                                </select>
                        </div>
                         <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >Tito de Descuento</label>
                                 <select name="tipo_descuento"  v-model="newcupon.tipo_descuento"  required>
                                    <option :value="null">Seleccione</option>
                                    <option value="Porcentual">Porcentual</option>
                                    <option value="Moneda">Moneda</option>
                                </select>
                        </div>
                           <div class="form-group col-md-3 col-12">
                                <label for="valor">Precio Total</label>
                                <input type="number" v-model="newcupon.valor" step=".01" name="valor" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3 col-12">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" v-model="newcupon.cantidad"  name="cantidad" class="form-control" required>
                            </div>
                             <div class="form-group col-md-3 col-12">
                                <label for="vence">Valido Hasta</label>
                                <input type="date" v-model="newcupon.vence"  name="vence" class="form-control" required>
                            </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Cupón</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
              <!--modal editar-->
             <div v-if="cuponSelected" class="modal fade" id="editarCupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Cupón</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editar-cupon" @submit.prevent="editarCupon(cuponSelected)" ref="form">
                          <div class="form-group col-md-6 col-12">
                                <label for="codigo" >Código</label>
                                <input type="text" v-model="cuponSelected.codigo" maxlength="20" required>
                                <button type="button"  @click.prevent="generar('editar')">Generar Código</button>
                        </div>
                         <div class="form-group col-md-6 col-12">
                                <label for="nombre" >Nombre</label>
                                <input type="text" v-model="cuponSelected.nombre" maxlength="200" required>
                                <button type="button"  @click.prevent="generar('editar')">Generar Código</button>
                        </div>
                        <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >Tito de Cupón</label>
                                 <select name="tipo_cupon"  v-model="cuponSelected.tipo_cupon" required>
                                    <option :value="null">Seleccione</option>
                                    <option value="Global">Global</option>
                                    <option value="Plan">Plan</option>
                                </select>
                        </div>
                         <div class="form-group col-md-6 col-12">
                                <label for="tipo_cupon" >Tito de Descuento</label>
                                 <select name="tipo_descuento"  v-model="cuponSelected.tipo_descuento"  required>
                                    <option :value="null">Seleccione</option>
                                    <option value="Porcentual">Porcentual</option>
                                    <option value="Moneda">Moneda</option>
                                </select>
                        </div>
                           <div class="form-group col-md-3 col-12">
                                <label for="valor">Precio Total</label>
                                <input type="number" v-model="cuponSelected.valor" step=".01" name="valor" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3 col-12">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" v-model="cuponSelected.cantidad"  name="cantidad" class="form-control" required>
                            </div>
                             <div class="form-group col-md-3 col-12">
                                <label for="vence">Valido Hasta</label>
                                <input type="date" v-model="cuponSelected.vence"  name="vence" class="form-control" required>
                            </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Agregar Cupón</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Searh from './search.vue';
    export default {
        name:'admin-cuponen',
        props:['cupones'],
        data() {
            return {
                proceso: false,
                cuponSelected:null,
                newcupon:{
                    codigo:null,
                    nombre:null,
                    tipo_cupon:null,
                    tipo_descuento:null,
                    vence:null,
                    cantidad:null,
                    valor:null,
                }
            }
        },
        components: {
            Searh,
        },
        computed: {
         ...mapGetters(["filteredCupones"]),
        },
        mounted () {
            if (this.cupones.length>0) {
                this.$store.commit("setCupones", this.cupones);
            };
        },
        methods: {
            cuponmodal(value,action) {
                if (action==='crear') {
                    $("#crearCupon").modal("show");
                }else{
                    this.cuponSelected=value;
                     setTimeout(function(){
                        $("#editarCupon").modal("show");
                    },200)
                    
                }
                
               
            },
            generar(action){
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < 20; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                if (action==='crear') {
                    this.newcupon.codigo=result;
                }else{
                    this.cuponSelected.codigo=result;
                }
           
            },
            crearCupon() {
                var url = '/admin/cupon';
                axios.post(url,this.newcupon).then((result) => {
                    window.location='/admin/cupon/'+result.data.id;
                }).catch((err) => {
                    console.log(err);
                });
            },
            editarCupon(cupon) {
                var url = '/admin/cupon/'+cupon.id;
                axios.put(url,cupon).then((result) => {
                    window.location='/admin/cupon/'+result.data.id;
                }).catch((err) => {
                    console.log(err);
                });
            },
            eliminarCupon(cupon) {
                this.proceso=true;
                var url = '/admin/cupon/'+cupon.id;
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

</style>
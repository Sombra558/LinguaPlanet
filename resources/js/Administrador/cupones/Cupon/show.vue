<template>
    <div class="container">
        <a href="/admin/cupones">Volver</a>
        <h1>{{cupon.nombre}}</h1>
        <span>Nombre del Cupon</span>

        <div class="row flex-column justify-content-center align-content-center">
                <h3>Código de descuento</h3>
                <div>
                    {{cupon.codigo}}
                </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span>Creado</span>
                <em>{{cupon.created_at}}</em>
            </div>
            <div class="col-6">
                <span>Vencimiento</span>
                <em>{{cupon.vence}}</em>
            </div>
            <div class="col-6">
                <span>Condicion de descuento</span>
                <p>{{cupon.valor}}  {{cupon.tipo_descuento === 'Porcentual' ? '%' : 'USD'}}</p>
            </div>
        </div>
               <div class="row">
            <button @click.prevent="seleccionartab('canjeos')" class="col-sm-12 col-md-3">
                Historial de Cupones Canjeados
            </button>
            <button v-if="cupon.tipo_cupon==='Plan'" @click.prevent="seleccionartab('membresias')" class="col-sm-12 col-md-3">
                Membresias
            </button>
            <div>

            </div>
        </div>
        <div v-if="tab==='canjeos'">
            <strong>Cupones canjeados</strong>
            <a href="#">Exportar CSV </a>
        </div>
         <div v-if="tab==='membresias'">
             <strong>Membresias relacionadas</strong>
             <button @click.prevent="relacionModal()">Relacionar Nueva Membresia</button>
              <table style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        
                        <th>Idioma</th>
                        
                        <th>Accion</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(membresia,index) in cupon.membresias" :key="'indice-'+index">
                    <td>{{membresia.nombre}}</td>
                    <td>{{membresia.idioma.idioma}}</td>
                   
                    <td>
                        <button @click.prevent="eliminarRelacion(membresia)">Eliminar</button>
                    </td>
                   
                </tr>
                </tbody>
            </table>
        </div>
         <!--modal crear relacion cupon membresia-->
             <div class="modal fade" id="crearRelacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Membreía</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form id="relacion-member" @submit.prevent="RelacionCreate()" >
                        <input type="hidden" :value="cupon.id" name="cupon_id">
                        <div class="form-group col-md-12 col-12">
                                <label for="membresia_id" >Seleccione Membresia</label>
                                 <select name="membresia_id" v-model="newrelacion.membresia_id" >
                                    <option :value="null">Seleccione</option>
                                    <option :value="membresia.id" v-for="membresia in membresias" :key="'member'+membresia.id">{{membresia.nombre}}</option>
                                  
                                </select>
                               
                        </div>
                   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button :disabled="proceso" type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </form>
                </div>              
                </div>
            </div>
            </div>
         
      
    
     
    </div>
</template>

<script>
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
               }
            }
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

</style>
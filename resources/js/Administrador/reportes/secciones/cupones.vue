<template>
    <div class="container">
        <h3 class="color-black mb-4">Reporte de cupones</h3>
        <div class="row">
            <div class="col-12 col-lg-3">
                <select class="form-input select-search input-primary mr-2" v-model="cuponSelected">
                     <option :value="null">Cupones disponibles</option>
                </select>
            </div>
            <div class="col-12 col-lg-9 d-flex flex-column flex-lg-row justify-content-center justify-content-md-end mt-3 mt-lg-0">
                <select class="form-input select-search input-primary col-lg-4 mr-2" v-model="membresiaSelected">
                    <option :value="null">Todas las membresias</option>
                    <option :value="membresia.id" v-for="membresia in membresias" :key="membresia.id">{{membresia.nombre}}</option>
                </select>
                <a class="btn btn-admin btn-outline-primary mt-3 mt-lg-0" href="#">
                    <span class="fw-500">Exportar</span>
                </a>
            </div>
        </div>
        <div class="table-container">
            <table class="table mt-4 table-admin table-borderless table-striped table-com">
                <thead>
                    <tr class="color-black">
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Tipo de Cupon</th>
                        <th>Tipo de Descuento</th>
                        <th>Valor</th>
                        <th>Cantidad</th>
                        <th>Usados</th>
                        <th>Vencimiento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(cupon,index) in filteredCupones" :key="index" class="color-black">
                        <td>{{cupon.nombre}}</td>
                        <td>{{cupon.codigo}}</td>
                        <td>{{cupon.tipo_cupon}}</td>
                        <td>{{cupon.tipo_descuento}}</td>
                        <td>{{cupon.valor}} {{cupon.tipo_descuento==='Porcentual' ? '%' : 'USD'}}</td>
                        <td>{{cupon.cantidad}}</td>
                        <td>{{cupon.usados.length}}</td>
                        <td>{{cupon.vence}}</td>
                    </tr>
                </tbody>
            </table>
        </div>         
    </div>
</template>

<script>
import { mapGetters } from "vuex";
    export default {
        name:'admin-cursos',
        props:['cupones','membresias'],
        data() {
            return {
                proceso: false,
                query: "",
            }
        },
        computed: {
         ...mapGetters(["filteredCupones"]),
            membresiaSelected: {
                get() {
                    return this.$store.state.filterCupones.membresia_id;
                },
                set(value) {
                    this.$store.commit("setfilterCupones", {
                    filter: "membresia_id",
                    value,
                    });
                },
            },
            cuponSelected: {
                get() {
                    return this.$store.state.filterCupones.cupon_id;
                },
                set(value) {
                    this.$store.commit("setfilterCupones", {
                    filter: "cupon_id",
                    value,
                    });
                },
            },
        },
        mounted () {
            if (this.cupones.length>0) {
                this.$store.commit("setCupones", this.cupones);
            };
       
        },
        methods: {
        
        },

    }
</script>

<style lang="scss" scoped>

</style>
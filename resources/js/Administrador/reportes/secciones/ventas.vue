<template>
    <div class="container">
        <h3 class="color-black mb-4">Reporte de ventas</h3>
        <div class="row">
            <div class="col-12 col-lg-3">
                <Searh accion="ventas"/>
            </div>
            <div class="col-12 col-lg-9 d-flex flex-column flex-lg-row justify-content-center justify-content-md-end mt-3 mt-lg-0">                
                <select class="form-input select-search input-primary col-lg-4 mr-2" v-model="metodosSelected">
                    <option :value="null">Todos los métodos</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Stripe">Stripe</option>
                    <option value="Sistema">Inscripcion por el Sistema</option>
                </select>
                <select class="form-input select-search input-primary col-lg-5 mr-2 mt-3 mt-lg-0" v-model="membresiaSelected">
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
                        <th>Correo electronico</th>
                        <th>Membresia</th>
                        <th>Comprobante</th>
                        <td>Método de pago</td>
                        <th>Perfiles por asignar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-black" v-for="(venta,index) in filteredVentas" :key="index">
                        <td>{{venta.user.email}}</td>
                        <td>{{venta.plan.membresia.nombre}}</td>
                        <td>{{venta.plan.nombre}}</td>
                        <!-- <td>{{venta.comprobante}}</td> -->
                        <td>{{venta.tipo}}</td>
                        <td>{{venta.available}}</td>                
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Searh from './search.vue';
    export default {
        name:'admin-cursos',
        props:['ventas','membresias'],
        data() {
            return {
                proceso: false,
                query: "",

            
            }
        },
        computed: {
         ...mapGetters(["filteredVentas"]),
            membresiaSelected: {
                get() {
                    return this.$store.state.filterVentas.membresia_id;
                },
                set(value) {
                    this.$store.commit("setfilterVentas", {
                    filter: "membresia_id",
                    value,
                    });
                },
            },
            metodosSelected: {
                get() {
                    return this.$store.state.filterVentas.metodo;
                },
                set(value) {
                    this.$store.commit("setfilterVentas", {
                    filter: "metodo",
                    value,
                    });
                },
            },
        },
         components: {
            Searh,
        },
        mounted () {
            if (this.ventas.length>0) {
                this.$store.commit("setVentas", this.ventas);
            };
       
        },
        methods: {
        
        },

    }
</script>

<style lang="scss" scoped>

</style>
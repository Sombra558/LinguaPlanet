

require('../bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
import Multiselect from 'vue-multiselect';

Vue.use(Vuex);
//home
Vue.component('home-component', require('./home/home.vue').default);
//cursos
Vue.component('cursos-component', require('./cursos/cursos.vue').default);
Vue.component('cursos-create', require('./cursos/Curso/create').default);
Vue.component('cursos-edit', require('./cursos/Curso/edit').default);
Vue.component('cursos-show', require('./cursos/Curso/show').default);
//cupones
Vue.component('cupones-component', require('./cupones/cupones.vue').default);
Vue.component('cupones-show', require('./cupones/Cupon/show.vue').default);
//membresia
Vue.component('membresias-component', require('./membresias/membresia').default);
//usuarios
Vue.component('usuarios-component', require('./usuarios/usuarios').default);
//configuraciones
Vue.component('configuraciones-component', require('./configuraciones/configuraciones').default);

const store = new Vuex.Store({
    state: {
        cursos:[],
        cupones:[],
        membresias:[],
        usuarios:[],
        inscripciones:[],
        filterCursos: {
            curso: "",
        },
        filterCupones: {
            codigo: "",
        },
        filterMembresias: {
            nombre: "",
        },
        filterUsuarios: {
            query: "",
        },
        filterInscripciones: {
            query: "",
        },
    },
    mutations: {
        setCursos(state, cursos) {
            state.cursos = cursos;
        },
        setCupones(state, cupones) {
            state.cupones = cupones;
        },
        setMembresias(state, membresias) {
            state.membresias = membresias;
        },
        setUsuarios(state, usuarios) {
            state.usuarios = usuarios;
        },
        setInscripciones(state, usuarios) {
            state.inscripciones = usuarios;
        },
        setfilterCursos(state, data) {
            state.filterCursos[data['filter']] = data.value;
        },
        setfilterCupones(state, data) {
            state.filterCupones[data['filter']] = data.value;
        },
        setfilterMembresias(state, data) {
            state.filterMembresias[data['filter']] = data.value;
        },
        setfilterUsuarios(state, data) {
            state.filterUsuarios[data['filter']] = data.value;
        },
        setfilterinscripciones(state, data) {
            state.filterInscripciones[data['filter']] = data.value;
        },
       
    },
    getters: {
        filteredCursos(state) {
            let cursos = state.cursos;
            if (state.filterCursos.curso.length > 1) {
                cursos = cursos.filter(r => r.titulo.toLowerCase().includes(state.filterCursos.curso.toLowerCase()));
            }
            return cursos;
        },
        filteredCupones(state) {
            let cupones = state.cupones;
            if (state.filterCupones.codigo.length > 1) {
                cupones = cupones.filter(r => r.codigo.toLowerCase().includes(state.filterCupones.codigo.toLowerCase()));
            }
            return cupones;
        },
        filteredMembresias(state) {
            let membresias = state.membresias;
            if (state.filterMembresias.nombre.length > 1) {
                membresias = membresias.filter(r => r.nombre.toLowerCase().includes(state.filterMembresias.nombre.toLowerCase()));
            }
            return membresias;
        },
        filteredUsuarios(state) {
            let usuarios = state.usuarios;
            if (state.filterUsuarios.query.length > 1) {
                usuarios = usuarios.filter(r => r.name.toLowerCase().includes(state.filterUsuarios.query.toLowerCase()) || r.lastname.toLowerCase().includes(state.filterUsuarios.query.toLowerCase()));
            }
            return usuarios;
        },
        filteredInscripciones(state) {
            let usuarios = state.inscripciones;
            if (state.filterInscripciones.query.length > 1) {
                usuarios = usuarios.filter(r => r.user.name.toLowerCase().includes(state.filterInscripciones.query.toLowerCase()) || r.user.lastname.toLowerCase().includes(state.filterInscripciones.query.toLowerCase()));
            }
            return usuarios;
        },
       
    }
});

const app = new Vue({
    el: '#admin-app',
    store
});
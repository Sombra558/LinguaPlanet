

require('../bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
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


const store = new Vuex.Store({
    state: {
        cursos:[],
        cupones:[],
        filterCursos: {
            curso: "",
        },
        filterCupones: {
            codigo: "",
        },
    },
    mutations: {
        setCursos(state, cursos) {
            state.cursos = cursos;
        },
        setCupones(state, cupones) {
            state.cupones = cupones;
        },
        setfilterCursos(state, data) {
            state.filterCursos[data['filter']] = data.value;
        },
        setfilterCupones(state, data) {
            state.filterCupones[data['filter']] = data.value;
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
       
    }
});

const app = new Vue({
    el: '#admin-app',
    store
});
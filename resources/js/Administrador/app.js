

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
//detalles padre cursos

const store = new Vuex.Store({
    state: {
        cursos:[],
        filterCursos: {
            curso: "",
        },
    },
    mutations: {
        setCursos(state, cursos) {
            state.cursos = cursos;
        },
        setfilterCursos(state, data) {
            state.filterCursos[data['filter']] = data.value;
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
       
    }
});

const app = new Vue({
    el: '#admin-app',
    store
});


require('../bootstrap');

window.Vue = require('vue');
//home
Vue.component('home-component', require('./Home/MiPerfiles/home').default);
//detalles padre cursos
Vue.component('cursos-padre-component', require('./Detalles/Cursos/index').default);
//detalles padre pagos membresias
Vue.component('pagos-padre-component', require('./Detalles/Membresias/index').default);
//perfil padre
Vue.component('perfil-padre-component', require('./Perfil/perfil').default);
//perfil estudiante (Hijo)
Vue.component('create-perfiluser', require('./PerfilUser/create').default);


const app = new Vue({
    el: '#padre-app',
});



require('../bootstrap');

window.Vue = require('vue');

Vue.component('preview-perfiluser', require('./PerfilUser/preview').default);
Vue.component('show-perfiluser', require('./PerfilUser/show').default);

//cursos
Vue.component('lista-cursos', require('./Cursos/listaCursos').default);
Vue.component('show-curso', require('./Cursos/show').default);

const app = new Vue({
    el: '#hijo-app',
});

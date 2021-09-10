

require('../bootstrap');

window.Vue = require('vue');

Vue.component('preview-perfiluser', require('./PerfilUser/preview').default);
Vue.component('show-perfiluser', require('./PerfilUser/show').default);
Vue.component('premios-perfiluser', require('./PerfilUser/premios').default);
Vue.component('armario-perfiluser', require('./PerfilUser/armario').default);
Vue.component('cara-avatar', require('./PerfilUser/caraAvatar').default);

//cursos
Vue.component('lista-cursos', require('./Cursos/listaCursos').default);
Vue.component('show-curso', require('./Cursos/show').default);

const app = new Vue({
    el: '#hijo-app',
});

const appNav = new Vue({
    el: '#hijo-nav',
});

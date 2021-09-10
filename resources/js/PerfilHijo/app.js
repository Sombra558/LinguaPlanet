

require('../bootstrap');

window.Vue = require('vue');

Vue.component('preview-perfiluser', require('./PerfilUser/preview').default);
Vue.component('show-perfiluser', require('./PerfilUser/show').default);
Vue.component('premios-perfiluser', require('./PerfilUser/premios').default);
Vue.component('armario-perfiluser', require('./PerfilUser/armario').default);

//cursos
Vue.component('lista-cursos', require('./Cursos/listaCursos').default);
Vue.component('show-curso', require('./Cursos/show').default);

//actividad

Vue.component('show-actividad', require('./Actividades/show').default);

const app = new Vue({
    el: '#hijo-app',
});

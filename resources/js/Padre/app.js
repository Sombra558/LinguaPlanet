

require('../bootstrap');

window.Vue = require('vue');
//perfil estudiante (Hijo)
Vue.component('create-perfiluser', require('./PerfilUser/create').default);
//

const app = new Vue({
    el: '#padre-app',
});

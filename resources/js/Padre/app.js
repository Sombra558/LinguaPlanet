

require('../bootstrap');

window.Vue = require('vue');
//perfil estudiante (Hijo)
Vue.component('create-perfiluser', require('./PerfilUser/create').default);


//home
Vue.component('home-component', require('./Home/MiPerfiles/home').default);
//

const app = new Vue({
    el: '#padre-app',
});

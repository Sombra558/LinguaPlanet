

require('../bootstrap');

window.Vue = require('vue');
//home
Vue.component('home-component', require('./Home/MiPerfiles/home').default);
//detalles padre cursos
Vue.component('cursos-padre-component', require('./Detalles/Cursos/index').default);
//detalles padre cursos individual
Vue.component('cursos-individual-component', require('./Detalles/Cursos/individual').default);
//detalles padre progreso curso
Vue.component('cursos-progreso-component', require('./Detalles/Cursos/cursoProgreso').default);
//certificados de los cursos
Vue.component('certificados-perfiles-component', require('./Detalles/Cursos/certificados').default);
//detalles padre pagos membresias
Vue.component('pagos-padre-component', require('./Detalles/Membresias/index').default);
// Edicion de membresia de usuario
Vue.component('membresia-editar-component', require('./Detalles/Membresias/editar').default);
//perfil padre
Vue.component('perfil-padre-component', require('./Perfil/perfil').default);
//perfil estudiante (Hijo)
Vue.component('create-perfiluser', require('./PerfilUser/create').default);
Vue.component('edit-perfiluser', require('./PerfilUser/edit').default);
Vue.component('cara-avatar', require('../PerfilHijo/PerfilUser/caraAvatar').default);

Vue.component('block-sidepanel', require('./blockSidepanel').default);

const app = new Vue({
    el: '#padre-app',
});



require('./bootstrap');




window.Vue = require('vue');


Vue.component('footer-component', require('./Landing/Templades/Footer/footer').default);

Vue.component('footerdos-component', require('./Landing/Templades/Footer/footer2').default);



const app = new Vue({
    el: '#app',
});

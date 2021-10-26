

require('./bootstrap');




window.Vue = require('vue');

import Vuex from 'vuex';

Vue.use(Vuex);


Vue.component('footer-component', require('./Landing/Templades/Footer/footer').default);

Vue.component('footerdos-component', require('./Landing/Templades/Footer/footer2').default);

Vue.component('cursos-component', require('./Landing/Cursos/Cursos').default);
Vue.component('curso-show-component', require('./Landing/Cursos/Show').default);
Vue.component('membresia-show-component', require('./Landing/Membresia/show').default);
Vue.component('payment-collase', require('./Landing/PaymentUtils/checkpayment').default);
Vue.component('proccess', require('./Landing/PaymentUtils/paymetprocess').default);
Vue.component('modalcupon', require('./Landing/PaymentUtils/cuponmodal').default);
Vue.component('articulos', require('./Landing/PaymentUtils/InputHiddensNoTocar/articulos').default);
Vue.component('precio', require('./Landing/PaymentUtils/precio').default);

const store = new Vuex.Store({
    state: {
        user: null,
        paymentselected:null,
        cupon:null,
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload.user;
        },
        setPayment(state, payment) {  
            state.paymentselected=payment;
         },
        setCupon(state, cupon) {  
            state.cupon=cupon;
        },
    },
    getters: {
       
        
    }
});

const app = new Vue({
    el: '#app',
    store
});

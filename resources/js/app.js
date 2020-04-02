/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('componentes', require('./components/ComponentesComponent.vue').default);
// declaramoe el componente de pensamiento el cual mandaremos a llamar en home 
Vue.component('pensamiento-component', require('./components/PensamientoComponent.vue').default);
// declaramoe el componente de formulario el cual mandaremos a llamar en home 
Vue.component('form-component', require('./components/FormComponent.vue').default);

const app = new Vue({
    el: '#app',
});

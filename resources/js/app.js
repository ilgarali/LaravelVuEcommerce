import store from './store'
import router from './router'
require('./bootstrap');

window.Vue = require('vue');

Vue.component('home', require('./components/Home.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    store,
    router,
    el: '#app',
});

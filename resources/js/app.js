
require('./bootstrap');


import Vue from 'vue';
import router from './router'


Vue.component('headercom', require('./components/Header.vue').default);
Vue.component('footercom', require('./components/Footer.vue').default);


const app = new Vue({
    el: '#app',
    data: {
        title: ' laravel 8'
    },
    router

});

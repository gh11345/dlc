/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueRouter from 'vue-router';

require('./bootstrap');
require('../sass/app.scss')
window.jQuery = window.$ = require('jquery');
window.axios = require('axios');
window.Vue = require('vue').default;
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// router
const routes = [
    {
        path: '/',
        component: require('./components/Home.vue').default,
        children: [
            {
                path: '/',
                name: 'home',
                component: require('./components/HomeContent').default
            },
            {
                path: '/products',
                name: 'products',
                component: require('./components/CategoryProducts').default
            },
            {
                path: '/addProduct',
                name: 'addProduct',
                component: require('./components/AddProduct').default
            }
        ]
    }
];

const router = new VueRouter({
    routes: routes
})
window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
}).$mount('#app');

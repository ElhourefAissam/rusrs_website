
import Vue from "vue"
require('./bootstrap');
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import 'vuetify/dist/vuetify.css'
import 'vuetify/dist/vuetify.min.css'

import router from './router';
import vuetify from './plugins/vuetify' // path to vuetify export

// Admin Components
Vue.component('admin-app', require('./components/AdminComponents/App.vue').default);
//pagination
Vue.component('pagination', require('laravel-vue-pagination'));



window.Vue = require('vue');


const app = new Vue({
    el: '#app',
    router,
    vuetify,
});

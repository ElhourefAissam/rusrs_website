import Vue from "vue"
require('./bootstrap');
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import 'vuetify/dist/vuetify.css'
import 'vuetify/dist/vuetify.min.css'
import '../sass/app.scss'
import '../sass/_variables.scss'


import router from './router';
import vuetify from './plugins/vuetify' // path to vuetify export

// login Components
Vue.component('admin-login', require('./components/AdminComponents/login.vue').default);

// Admin Components
Vue.component('admin-app', require('./components/AdminComponents/App.vue').default);
//pagination
Vue.component('pagination', require('laravel-vue-pagination'));
// Front App
Vue.component('front-page', require("./components/main-components/Front.vue").default);



window.Vue = require('vue');


const app = new Vue({
    el: '#app',
    router,
    vuetify,
});
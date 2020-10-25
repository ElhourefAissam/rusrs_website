/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



Vue.component('front-page'    , require('./components/main-components/Front.vue').default);
Vue.component('navbar-element', require('./components/main-components/Navbar.vue').default);
Vue.component('section-about', require('./components/main-components/About.vue').default);
Vue.component('section-contact', require('./components/main-components/Contact.vue').default);
Vue.component('section-footer', require('./components/main-components/Footer.vue').default);
Vue.component('section-masthead', require('./components/main-components/Masthead.vue').default);
Vue.component('section-modal', require('./components/main-components/Modal.vue').default);
Vue.component('section-portfolio-grid', require('./components/main-components/Portfolio-grid.vue').default);
Vue.component('section-services', require('./components/main-components/Services.vue').default);
Vue.component('section-team'    , require('./components/main-components/Team.vue').default);



const app = new Vue({
    el: '#app'
});

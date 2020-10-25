/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



<<<<<<< HEAD
Vue.component('front-page', require('./components/main-components/Front.vue').default);
Vue.component('navbar-element', require('./components/main-components/Navbar.vue').default);
Vue.component('section-about', require('./components/main-components/About.vue').default);
Vue.component('section-contact', require('./components/main-components/Contact.vue').default);
Vue.component('section-footer', require('./components/main-components/Footer.vue').default);
=======
Vue.component('front-page'      , require('./components/main-components/Front.vue').default);
Vue.component('navbar-element'  , require('./components/main-components/Navbar.vue').default);
Vue.component('section-about'   , require('./components/main-components/About.vue').default);
Vue.component('section-contact' , require('./components/main-components/Contact.vue').default);
Vue.component('section-footer'  , require('./components/main-components/Footer.vue').default);
>>>>>>> d33e299f018e45373343bd37f9f375a03fcfc245
Vue.component('section-masthead', require('./components/main-components/Masthead.vue').default);
Vue.component('section-modal'   , require('./components/main-components/Modal.vue').default);
Vue.component('section-portfolio-grid', require('./components/main-components/Portfolio-grid.vue').default);
Vue.component('section-services', require('./components/main-components/Services.vue').default);
Vue.component('section-team', require('./components/main-components/Team.vue').default);


// Article
Vue.component('Article', require('./components/ArticleComponents/Article.vue').default);
Vue.component('Add-Article', require('./components/ArticleComponents/AddArticle.vue').default);
Vue.component('Edit-Article', require('./components/ArticleComponents/EditArticle.vue').default);
Vue.component('Delete-Article', require('./components/ArticleComponents/DeleteArticle.vue').default);
Vue.component('Show-Article', require('./components/ArticleComponents/ShowArticle.vue').default);



//Don't touch it.. its for pagination
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app'
});
require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');

import router from './router'

// vuejs version
console.log('Version : ' + Vue.version);

// this is the main page
Vue.component('main-page'      , require('./components/main-components/Main.vue').default);

// those are the main childrens
Vue.component('navbar-element'  , require('./components/main-components/Navbar.vue').default);
Vue.component('section-articles'   , require('./components/main-components/Articles.vue').default);
Vue.component('section-contact' , require('./components/main-components/Contact.vue').default);
Vue.component('section-footer'  , require('./components/main-components/Footer.vue').default);
Vue.component('section-masthead', require('./components/main-components/Masthead.vue').default);
Vue.component('section-modal', require('./components/main-components/Modal.vue').default);
Vue.component('section-gallery', require('./components/main-components/Gallery.vue').default);
Vue.component('section-services', require('./components/main-components/Services.vue').default);
Vue.component('section-team', require('./components/main-components/Team.vue').default);
Vue.component('section-events', require('./components/main-components/Events.vue').default);
Vue.component('section-program', require('./components/main-components/Program.vue').default);


// the main layout for mini program of CRUD operations -> containes articles,events,members,program componenets ...
    // write code

// Article componenets for CRUD operations
Vue.component('Article', require('./components/ArticleComponents/Article.vue').default);
Vue.component('Add-Article', require('./components/ArticleComponents/AddArticle.vue').default);
Vue.component('Edit-Article', require('./components/ArticleComponents/EditArticle.vue').default);
Vue.component('Delete-Article', require('./components/ArticleComponents/DeleteArticle.vue').default);
Vue.component('Show-Article', require('./components/ArticleComponents/ShowArticle.vue').default);

// Events componenets for CRUD operations
    // write code

// Program FID WA ASTAFID componenets for CRUD operations
    // write code

// Members componenets for CRUD operations
    // write code


<<<<<<< HEAD

//pagination
=======
//Don't touch it.. its for pagination
>>>>>>> c0db554d56e65466b7255fd8bd0bf04b529e07f8
Vue.component('pagination', require('laravel-vue-pagination'));



const app = new Vue({
<<<<<<< HEAD
    el: '#app'
});
=======
    el: '#app',
    router
});
>>>>>>> c0db554d56e65466b7255fd8bd0bf04b529e07f8

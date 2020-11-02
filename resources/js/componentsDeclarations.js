import Vue from 'vue';


// this is the main page
Vue.component('main-page', require('./components/main-components/Main.vue').default);

// those are the main childrens
Vue.component('navbar-element', require('./components/main-components/Navbar.vue').default);
Vue.component('section-articles', require('./components/main-components/Articles.vue').default);
Vue.component('section-contact', require('./components/main-components/Contact.vue').default);
Vue.component('section-footer', require('./components/main-components/Footer.vue').default);
Vue.component('section-masthead', require('./components/main-components/Masthead.vue').default);
Vue.component('section-modal', require('./components/main-components/Modal.vue').default);
Vue.component('section-gallery', require('./components/main-components/Gallery.vue').default);
Vue.component('section-services', require('./components/main-components/Services.vue').default);
Vue.component('section-team', require('./components/main-components/Team.vue').default);
Vue.component('section-events', require('./components/main-components/Events.vue').default);
Vue.component('section-program', require('./components/main-components/Program.vue').default);


// the main layout for mini program of CRUD operations -> containes articles,events,members,program componenets ...
// write code

// Admin Components
Vue.component('admin-app', require('./components/AdminComponents/App.vue').default);

// Nav Components
Vue.component('Nav', require('./components/NavComponents/Nav.vue').default);


// Article componenets for CRUD operations
Vue.component('Article', require('./components/ArticleComponents/Article.vue').default);
Vue.component('Add-Article', require('./components/ArticleComponents/AddArticle.vue').default);
Vue.component('Edit-Article', require('./components/ArticleComponents/EditArticle.vue').default);
Vue.component('Delete-Article', require('./components/ArticleComponents/DeleteArticle.vue').default);
Vue.component('Show-Article', require('./components/ArticleComponents/ShowArticle.vue').default);

// Events componenets for CRUD operations
Vue.component('Event-list', require('./components/EventComponents/EventList.vue').default);
Vue.component('Add-Event', require('./components/EventComponents/AddEvent.vue').default);
Vue.component('Edit-Event', require('./components/EventComponents/EditEvent.vue').default);
Vue.component('Delete-Event', require('./components/EventComponents/DeleteEvent.vue').default);
Vue.component('Show-Event', require('./components/EventComponents/ShowEvent.vue').default);


// Members componenets for CRUD operations
Vue.component('Member-list', require('./components/MemberComponents/MemberList.vue').default);
Vue.component('Add-Member', require('./components/MemberComponents/AddMember.vue').default);
Vue.component('Edit-Member', require('./components/MemberComponents/EditMember.vue').default);
Vue.component('Delete-Member', require('./components/MemberComponents/DeleteMember.vue').default);
Vue.component('Show-Member', require('./components/MemberComponents/ShowMember.vue').default);

// Program FID WA ASTAFID componenets for CRUD operations
Vue.component('Program-list', require('./components/ProgramComponents/ProgramList.vue').default);
Vue.component('Add-Program', require('./components/ProgramComponents/AddProgram.vue').default);
Vue.component('Edit-Program', require('./components/ProgramComponents/EditProgram.vue').default);
Vue.component('Delete-Program', require('./components/ProgramComponents/DeleteProgram.vue').default);
Vue.component('Show-Program', require('./components/ProgramComponents/ShowProgram.vue').default);

//pagination
Vue.component('pagination', require('laravel-vue-pagination'));

//Image uploader component
Vue.component('image-uploader', require('./components/ImageUploaderComponent/ImageUploader.vue').default);
Vue.component('video-player', require('./components/VideoComponents/displayVideo.vue').default);
Vue.component('alert-notification', require('./components/Notifications/alertComponent.vue').default);


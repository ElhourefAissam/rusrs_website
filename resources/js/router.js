import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)


//projects routes....
const routes = [
    //Admin
    {
        path: '/Article',
        name: 'Article',
        component: () =>
            import ("./components/AdminComponents/ArticleComponents/ArticleList")
    },
    {
        path: '/Event',
        name: 'Event',
        component: () =>
            import ("./components/AdminComponents/EventComponents/EventList.vue")
    },
    {
        path: '/Member',
        name: 'Member',
        component: () =>
            import ("./components/AdminComponents/MemberComponents/MemberList.vue")
    },
    {
        path: '/Program',
        name: 'Program',
        component: () =>
            import ("./components/AdminComponents/ProgramComponents/ProgramList.vue")
    },
    {
        path: '/Gallery',
        name: 'Gellery',
        component: () =>
            import ("./components/AdminComponents/GalleryComponent/GalleryList.vue")
    },

    {
        path: '/',
        redirect:'/Article'
    },

    {
        path: '*',
        component: () =>
            import ("./components/NotFound/NotFound.vue")
    },
]


export default new Router({
    mode: 'history',
    routes
})

new Vue(
    Vue.util.extend({ routes })
)
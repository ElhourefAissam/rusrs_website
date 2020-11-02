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
            import ("./components/ArticleComponents/Article")
    },
    {
        path: '/Event',
        name: 'Event',
        component: () =>
            import ("./components/EventComponents/EventList.vue")
    },
    {
        path: '/Member',
        name: 'Member',
        component: () =>
            import ("./components/MemberComponents/MemberList.vue")
    },
    {
        path: '/Program',
        name: 'Program',
        component: () =>
            import ("./components/ProgramComponents/ProgramList.vue")
    },
    //
    // login
    {
        path: '/auth/login',
        name: 'login',
        component: () =>
            import ("./components/AdminComponents/login.vue")
    },
    //
]


export default new Router({
    mode: 'history',
    routes
})

new Vue(
    Vue.util.extend({ routes })
)